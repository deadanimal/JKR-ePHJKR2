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
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.inline-div {
  display: block;
  text-align: center;
}

h4
{
  display: inline-block;
  text-align: center;
}
   </style>

@section('content')

<!--Part 1-->
<h1 class="mt-3">Perutusan KPKR</h1>
<br>
<br>
<div class="clearfix">
    <div class="img-container">
        <img src="/assets/img/11.png" alt="Error" width="300" height="300">
        <figcaption> YBhg. Datuk Ir. Haji Mohamaf Zulkefly Bin Sulaiman <br>
        Ketua Pengarah <br>
        Jabatan Kerja Raya Malaysia </figcaption>
    </div>
    <div class="img-container">
        <img src="/assets/img/12.png" alt="Error" style="width: 100%">
        <figcaption align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti. Curabitur mattis est ut eleifend sollicitudin. Donec augue turpis, condimentum vel erat sit amet, elementum sagittis enim. Curabitur vitae pretium augue, quis rutrum turpis. 
            Donec risus metus, tempor eget pretium vitae, semper at lectus. </figcaption>
    </div>
</div>
<p class="mt-3" align="justify">Suspendisse lacinia ex eget vehicula auctor. Phasellus porta lectus congue arcu facilisis, eu hendrerit nulla ultricies. Curabitur finibus erat neque, vel ornare erat rutrum at. Maecenas eu urna ut enim molestie gravida. Donec tincidunt ullamcorper pharetra. Etiam a posuere enim, ut iaculis nibh. Cras pharetra ut ex quis malesuada. Donec consequat purus nisi, in placerat ligula imperdiet vitae. Phasellus volutpat arcu sed nulla convallis, nec bibendum tellus eleifend. Nullam malesuada, mi id tincidunt malesuada, libero est tristique arcu, ac vulputate nulla eros sed turpis. Nulla facilisi. Curabitur tempus quam nunc, nec rutrum justo placerat vel. n mattis non nunc et mattis. Duis quis lacinia eros. Sed ullamcorper pellentesque ultrices. Morbi consectetur arcu libero, at commodo nisl pellentesque a. Morbi feugiat dui et ligula laoreet, non viverra ipsum pharetra. Donec luctus ultrices orci at mollis. Quisque bibendum sapien id lacus dignissim, ut dictum odio placerat. In at dictum leo. Etiam ligula enim, bibendum commodo ultricies id, fringilla non nunc. In hac habitasse platea dictumst. Praesent nec tempus sapien. Nulla sit amet consequat diam. Nulla accumsan, tellus sit amet blandit aliquam, lorem erat placerat est, ut feugiat nulla enim in dui.

    Cras eleifend libero sed nisi sagittis, id ultricies velit volutpat. Maecenas quis consectetur nisi. Fusce tempor faucibus nibh, ac sodales est vestibulum eget. Morbi blandit scelerisque malesuada. Mauris sed lacus vel libero vulputate mollis. Sed nulla tortor, consequat id nunc id, blandit iaculis leo. Sed facilisis risus elit, vitae rutrum odio lacinia vitae. Nam ac massa blandit, rhoncus tellus nec, ullamcorper lorem. Vestibulum euismod eu nulla eu pharetra. Fusce vitae gravida sapien. Sed ut pharetra lorem. Proin pulvinar aliquam risus, in ullamcorper ex porttitor eget. Proin ut vulputate sapien, vel rhoncus massa.</p>

<img src="/assets/img/footer.png" alt="Error" width="1266" height="300">

<!--Part 2-->
<h1 class="mt-3 mb-3">Sejarah JKR</h1>
<h3>Peristiwa semasa</h3>
<h3 class="mb-3">Public Works Department diwujudkan</h3>

<img src="/assets/img/13.png" alt="Error" class="center" style="width: 100%">
<p class="mt-3" align="justify">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti. Curabitur mattis est ut eleifend sollicitudin. Donec augue turpis, condimentum vel erat sit amet, elementum sagittis enim. Curabitur vitae pretium augue, quis rutrum turpis. Donec risus metus, tempor eget pretium vitae, semper at lectus.

Suspendisse lacinia ex eget vehicula auctor. Phasellus porta lectus congue arcu facilisis, eu hendrerit nulla ultricies. Curabitur finibus erat neque, vel ornare erat rutrum at. Maecenas eu urna ut enim molestie gravida. Donec tincidunt ullamcorper pharetra. Etiam a posuere enim, ut iaculis nibh. Cras pharetra ut ex quis malesuada. Donec consequat purus nisi, in placerat ligula imperdiet vitae. Phasellus volutpat arcu sed nulla convallis, nec bibendum tellus eleifend. Nullam malesuada, mi id tincidunt malesuada, libero est tristique arcu, ac vulputate nulla eros sed turpis. Nulla facilisi. Curabitur tempus quam nunc, nec rutrum justo placerat vel.
</p>

<p class="mt-3" align="justify">
    In mattis non nunc et mattis. Duis quis lacinia eros. Sed ullamcorper pellentesque ultrices. Morbi consectetur arcu libero, at commodo nisl pellentesque a. Morbi feugiat dui et ligula laoreet, non viverra ipsum pharetra. Donec luctus ultrices orci at mollis. Quisque bibendum sapien id lacus dignissim, ut dictum odio placerat. In at dictum leo. Etiam ligula enim, bibendum commodo ultricies id, fringilla non nunc. In hac habitasse platea dictumst. Praesent nec tempus sapien. Nulla sit amet consequat diam. Nulla accumsan, tellus sit amet blandit aliquam, lorem erat placerat est, ut feugiat nulla enim in dui.
</p>

<h3>Ringkasan Sejarah JKR</h3>
<p class="mt-3" align="justify">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti. Curabitur mattis est ut eleifend sollicitudin. Donec augue turpis, condimentum vel erat sit amet, elementum sagittis enim. Curabitur vitae pretium augue, quis rutrum turpis. Donec risus metus, tempor eget pretium vitae, semper at lectus.

    Suspendisse lacinia ex eget vehicula auctor. Phasellus porta lectus congue arcu facilisis, eu hendrerit nulla ultricies. Curabitur finibus erat neque, vel ornare erat rutrum at. Maecenas eu urna ut enim molestie gravida. Donec tincidunt ullamcorper pharetra. Etiam a posuere enim, ut iaculis nibh. Cras pharetra ut ex quis malesuada. Donec consequat purus nisi, in placerat ligula imperdiet vitae. Phasellus volutpat arcu sed nulla convallis, nec bibendum tellus eleifend. Nullam malesuada, mi id tincidunt malesuada, libero est tristique arcu, ac vulputate nulla eros sed turpis. Nulla facilisi. Curabitur tempus quam nunc, nec rutrum justo placerat vel.
</p>
<img src="/assets/img/14.png" alt="Error" width="300" height="300" align="right">
<br>
<img src="/assets/img/15.png" alt="Error" class="center" style="width: 100%">


<h3 class="mt-3 mb-3">Senarai Lengkap Peneraju PWD / JKR</h3>
<img src="/assets/img/16.png" alt="Error" class="center" style="width: 100%">
<p class="mt-3" align="justify">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti. Curabitur mattis est ut eleifend sollicitudin. Donec augue turpis, condimentum vel erat sit amet, elementum sagittis enim. Curabitur vitae pretium augue, quis rutrum turpis. Donec risus metus, tempor eget pretium vitae, semper at lectus.
</p>
<p class="mt-3" align="justify">
1. Suspendisse lacinia ex eget vehicula auctor.
</p>
<p class="mt-3" align="justify">
2. Phasellus porta lectus congue arcu facilisis, eu hendrerit nulla ultricies.
</p>
<p class="mt-3" align="justify">
3. Curabitur finibus erat neque, vel ornare erat rutrum at.
</p>
<p class="mt-3" align="justify">
4. Maecenas eu urna ut enim molestie gravida.
</p>
<p class="mt-3" align="justify">
5. Donec tincidunt ullamcorper pharetra.
</p>
<p class="mt-3" align="justify">
6. Etiam a posuere enim, ut iaculis nibh.
</p>
<p class="mt-3" align="justify">
7. Cras pharetra ut ex quis malesuada.
</p>
<p class="mt-3" align="justify">
8. Donec consequat purus nisi, in placerat ligula imperdiet vitae.
</p>
<p class="mt-3" align="justify">
9. Phasellus volutpat arcu sed nulla convallis, nec bibendum tellus eleifend.
</p>
<p class="mt-3" align="justify">
10. Nullam malesuada, mi id tincidunt malesuada, libero est tristique arcu, ac vulputate nulla eros sed turpis.
11. Curabitur tempus quam nunc, nec rutrum justo placerat vel.
</p>
<img src="/assets/img/footer.png" alt="Error" width="1266" height="300">






<!--Part 3-->
<p class="mt-6 mb-6" align="center">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. 
</p>

<img src="/assets/img/17.png" alt="Error" class="center" style="width: 100%">
<img src="/assets/img/18.png" alt="Error" class="center" style="width: 100%">

<h3 class="mt-6" style="text-align: center">Objektif</h3>
<p class="mt-3" align="justify" style="text-align: center">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien.
</p>
<strong>“Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti.”</strong>

<div class="inline-div">
    <h4>Fungsi</h4>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien.

“Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti.”
    </p>
    <h4>Profil</h4>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut odio sapien. Fusce eget consectetur nisi. Proin accumsan augue at varius auctor. Etiam ut quam viverra, condimentum quam quis, fringilla urna. Donec pulvinar tempor feugiat. Suspendisse potenti.
    </p>
  </div>


<img src="/assets/img/footer.png" alt="Error" width="1266" height="300">






@endsection