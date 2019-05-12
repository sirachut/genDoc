

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#one">ข้อมูล</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#two">รายงานเรียนผู้อำนวยการ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#three">รายละเอียดแนบท้าย</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#four">รายงานเรียนหัวหน้าเจ้าหน้าที่</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#five">ใบสั่งซื้อ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#six">ใบตรวจรับพัสดุ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#seven">ใบเบิกพัสดุ</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#eight">บัญชีวัสดุ</a>
    </li>
</ul>
    
<!-- Tab panes -->
<div class="tab-content">
    <div id="one" class="container tab-pane active" ><br>
        @include('showtype/show_doc.one')
    </div>

    <div id="two" class="container tab-pane fade"><br>
        @include('showtype/show_doc.two')
    </div>

    <div id="three" class="container tab-pane fade"><br>
        @include('showtype/show_doc.three')
    </div>

    <div id="four" class="container tab-pane fade"><br>
        @include('showtype/show_doc.four')
    </div>

    <div id="five" class="container tab-pane fade"><br>
        @include('showtype/show_doc.five')
    </div>

</div>