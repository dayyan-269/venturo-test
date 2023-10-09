@extends('main')
@section('main_body')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Venturo - Laporan penjualan tahunan per menu
    </div>
    <div class="card-body">
      @method('GET')
      <form action="" method="GET" class="d-flex flex-row gap-2">
        <div class="form-group col-2">
          <select class="form-control" name="tahun">
            <option value="">Pilih Tahun</option>
            <option value="2021" {{ request()->get('tahun') === '2021' ? 'selected' : '' }}>2021</option>
            <option value="2022" {{ request()->get('tahun') === '2022' ? 'selected' : '' }}>2022</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>

        @if (request()->get('tahun'))
        <a target="_blank" class="btn btn-secondary" href="http://tes-web.landa.id/intermediate/menu" role="button">JSON
          Menu</a>
        <a target="_blank" class="btn btn-secondary" href="http://tes-web.landa.id/intermediate/menu" role="button">JSON
          Transaksi</a>
        <a target="_blank" class="btn btn-secondary" href="http://tes-web.landa.id/intermediate/menu"
          role="button">Download
          Example</a>
        @endif
      </form>

      @if (request()->get('tahun'))
      <hr>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="table-dark">
              <th class="text-center align-middle " rowspan="2">Menu</th>
              <th class="text-center" colspan="12">Periode Pada {{ request()->get('tahun') }}</th>
              <th class="text-center align-middle" rowspan="2">Total</th>
            </tr>
            <tr class="table-dark">
              <th class="text-center">Jan</th>
              <th class="text-center">Feb</th>
              <th class="text-center">Mar</th>
              <th class="text-center">Apr</th>
              <th class="text-center">Mei</th>
              <th class="text-center">Jun</th>
              <th class="text-center">Jul</th>
              <th class="text-center">Ags</th>
              <th class="text-center">Sep</th>
              <th class="text-center">Okt</th>
              <th class="text-center">Nov</th>
              <th class="text-center">Des</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="table-secondary font-weight-bold" colspan="14">
                <b>Makanan</b>
              </td>
            </tr>
            @foreach ($foodsList as $item)
            <tr>
              <td>{{ $item->menu }}</td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 1))
                {{ number_format($transaksiList[$item->menu][1], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 2))
                {{ number_format($transaksiList[$item->menu][2], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 3))
                {{ number_format($transaksiList[$item->menu][3], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 4))
                {{ number_format($transaksiList[$item->menu][4], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 5))
                {{ number_format($transaksiList[$item->menu][5], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 6))
                {{ number_format($transaksiList[$item->menu][6], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 8))
                {{ number_format($transaksiList[$item->menu][8], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 8))
                {{ number_format($transaksiList[$item->menu][8], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 9))
                {{ number_format($transaksiList[$item->menu][9], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 10))
                {{ number_format($transaksiList[$item->menu][10], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 11))
                {{ number_format($transaksiList[$item->menu][11], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 12))
                {{ number_format($transaksiList[$item->menu][12], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn ($value, $key) => $key == $item->menu))
                <b>{{ number_format($transaksiList[$item->menu]->sum()) }}</b>
                @else
                <b>0</b>
                @endif
              </td>
            </tr>
            @endforeach

            <tr>
              <td class="table-secondary font-weight-bold" colspan="14">
                <b>Minuman</b>
              </td>
            </tr>
            @foreach ($drinksList as $item)
            <tr>
              <td>{{ $item->menu }}</td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 1))
                {{ number_format($transaksiList[$item->menu][1], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 2))
                {{ number_format($transaksiList[$item->menu][2], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 3))
                {{ number_format($transaksiList[$item->menu][3], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 4))
                {{ number_format($transaksiList[$item->menu][4], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 5))
                {{ number_format($transaksiList[$item->menu][5], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 6))
                {{ number_format($transaksiList[$item->menu][6], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 7))
                {{ number_format($transaksiList[$item->menu][7], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 8))
                {{ number_format($transaksiList[$item->menu][8], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 9))
                {{ number_format($transaksiList[$item->menu][9], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 10))
                {{ number_format($transaksiList[$item->menu][10], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 11))
                {{ number_format($transaksiList[$item->menu][11], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn($value, $key) => $key == $item->menu) &&
                $transaksiList[$item->menu]->contains(fn ($value, $key) => $key == 12))
                {{ number_format($transaksiList[$item->menu][12], 0) }}
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiList->contains(fn ($value, $key) => $key == $item->menu))
                <b>{{ number_format($transaksiList[$item->menu]->sum()) }}</b>
                @else
                <b>0</b>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr class="table-dark">
              <td>
                <b>Total</b>
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 1))
                <b>{{ number_format($transaksiPerMonth[1], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 2))
                <b>{{ number_format($transaksiPerMonth[2], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 3))
                <b>{{ number_format($transaksiPerMonth[3], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 4))
                <b>{{ number_format($transaksiPerMonth[4], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 5))
                <b>{{ number_format($transaksiPerMonth[5], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 6))
                <b>{{ number_format($transaksiPerMonth[6], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 7))
                <b>{{ number_format($transaksiPerMonth[7], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 8))
                <b>{{ number_format($transaksiPerMonth[8], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 9))
                <b>{{ number_format($transaksiPerMonth[9], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 10))
                <b>{{ number_format($transaksiPerMonth[10], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 11))
                <b>{{ number_format($transaksiPerMonth[11], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                @if ($transaksiPerMonth->contains(fn ($value, $key) => $key == 12))
                <b>{{ number_format($transaksiPerMonth[12], 0) }}</b>
                @endif
              </td>
              <td class="text-end">
                <b>{{ number_format($transaksiPerMonth->sum(), 0) }}</b>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection