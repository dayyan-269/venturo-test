<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $getMenuList = Http::get('https://tes-web.landa.id/intermediate/menu');
    $getTransaksiList = Http::get('https://tes-web.landa.id/intermediate/transaksi', [
      'tahun' => $request->get('tahun'),
    ]);

    $menuResponse = json_decode($getMenuList->body());
    $transaksiResponse = json_decode($getTransaksiList->body());
    
    $menuList = collect($menuResponse);
    $transaksiList = collect($transaksiResponse);

    $foodsList = $menuList->filter(function ($current) {
      return $current->kategori === 'makanan';
    });

    $drinksList = $menuList->filter(function ($current) {
      return $current->kategori === 'minuman';
    });

    $grouppedTransaksi = $transaksiList->groupBy('menu');

    // perhitungan total per bulan tiap produk
    $transaksiBulanan = $grouppedTransaksi->map(function ($current) {
      $groupByMenu = $current->map(function ($i) {
        return [
          'menu' => $i->menu,
          'total' => $i->total,
          'bulan' => intval(date('m', strtotime($i->tanggal)))
        ];
      });

      $groupByMonth = $groupByMenu->groupBy('bulan')->map(function ($curr) {
        return $curr->sum('total');
      });

      return $groupByMonth;
    });

    // Perhitungan total per bulan semua produk
    $groupByMonth = $transaksiList->groupBy(function ($curr) {
      return intval(date('m', strtotime($curr->tanggal)));
    });

    $sumPerMonth = $groupByMonth->map(function ($curr) {
      $sumMenu = $curr->map(function ($i) {
        return [
          'total' => $i->total,
        ];
      });

      return $sumMenu->sum('total');
    });

    return view('home', [
      'drinksList' => $drinksList,
      'foodsList' => $foodsList,
      'transaksiList' => $transaksiBulanan,
      'transaksiPerMonth' => $sumPerMonth,
    ]);
  }
}
