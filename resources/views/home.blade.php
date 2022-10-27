@extends('layouts.anon')
<style>
 * {
  box-sizing: border-box;
}

.img-container {
  float: left;
  width: 30%;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>

@section('content')
<img src="/assets/img/3.png" alt="Error" width="1266" height="300">
<img src="/assets/img/2.png" alt="Error" width="1266" height="300">
<img src="/assets/img/4.png" alt="Error" width="1266" height="300">
<img src="/assets/img/5.png" alt="Error" width="1266" height="300">
<div class="clearfix">
    <div class="img-container">
        <img src="/assets/img/6.png" alt="Error" style="width:100%">
    </div>
    <div class="img-container">
        <img src="/assets/img/7.png" alt="Error" style="width:100%">
    </div>
    <div class="img-container">
        <img src="/assets/img/8.png" alt="Error" style="width:100%">
    </div>
    <div class="img-container">
        <img src="/assets/img/9.png" alt="Error" style="width:100%">
    </div>
    <div class="img-container">
        <img src="/assets/img/10.png" alt="Error" style="width:100%">
    </div>
</div>
<img src="/assets/img/footer.png" alt="Error" width="1266" height="300">



@endsection