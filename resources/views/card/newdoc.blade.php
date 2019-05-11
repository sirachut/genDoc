{{-- <h2>Responsive Table with Bootstrap</h2> --}}

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">ตารางแสดงเอกสาร <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>
          <thead>
            <tr>
              <th>ลำดับที่</th>
              <th>ชื่อโครงการ</th>
              <th>สร้างเมื่อวันที่</th>
              <th>ฝ่ายงาน</th>
              <th>จัดการ</th>
            </tr>
          </thead>
          <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($project_n_Q as $value)
            <form class="form-horizontal" method="POST" action="{{ route('home.destroy',$value->project_id) }}" >

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->project_name }}</td>
                    <td> @php
                            echo App\Http\Controllers\DocumentController::DateThai($value->project_datein);
                        @endphp
                    </td>
                    <td>{{ $value->project_department }}</td>
                    <td>
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('home.show', $value->project_id) }}"><i class="fas fa-info-circle"></i> info</a>
                        <button type="submit"></button>t
                    </td>
                </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5" class="text-center">Data retrieved from <a href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a> and <a href="http://www.worldometers.info/world-population/population-by-country/" target="_blank">worldometers</a>.</td>
            </tr>
          </tfoot>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>

<p class="p">Demo by George Martsoukos. <a href="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions" target="_blank">See article</a>.</p>


<style>
    h2 {
  text-align: center;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
</style>