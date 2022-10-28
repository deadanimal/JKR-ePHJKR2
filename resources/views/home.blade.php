@extends('layouts.anon')
<style>
 .parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  top: 10;
  left: 90;
}
.image2 {
  position: absolute;
  top: 40px;
  left: 140px;
}
.image3 {
  position: absolute;
  top: 70px;
  left: 300px;
}
.image4 {
  position: relative;
  top: 10;
  left: 90;
}
.image5 {
  position: absolute;
  top: 120px;
  left: 70px;
}
.image6 {
  position: absolute;
  top: 210px;
  left: 130px;
}
.image7 {
  position: absolute;
  top: 50px;
  left: 200px;
}
.image8 {
  position: absolute;
  top: 0px;
  left: 200px;
}
.image9 {
  position: relative;
  top: 130px;
  left: 130px;
}

</style>

@section('content')
        {{-- <div class="col" style="background-color: #F4A258; padding: 35px 70px;">
          <div class="row">
            <div class="col-6">
                <div class="parent">
                    <img class="image1" src="/assets/img/pjkr1.png" width="100" height="100"/>
                    <img class="image2" src="/assets/img/pjkr2.png" width="200" height="200"/>
                    <img class="image3" src="/assets/img/pjkr3.png" width="100" height="100"/>
                  </div>
            </div>
            <div class="col-6">
                <h3 class="mt-4 mb-3 text-center" style="color: #8C271E;">Perutusan JKR</h3>
                <p style="text-align: center; color: #8C271E;">Kami akan menjadi pemberi perkhidmatan bertaraf dunia dan pusat kecemerlangan di dalam bidang pengurusan aset, pengurusan projek dan perkhidmatan kejuruteraan demi pembangunan infrastruktur negara 
                    melalui modal insan yang kreatif dan inovatif serta teknologi terkini.</p>
              <div class="text-center">
                <a href="#myBtn1" class="btn btn-perutusan-jkr">Teruskan</a>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="col" style="background-color: #5B8E7D; padding: 35px 70px;">
          <div class="row">
            <div class="col-6">
                <h3 class="text-white mt-4" style="text-align:center">Sejarah JKR</h3>
                <p class="text-white" style="text-align: center">Dalam tahun 1858 jawatan Ketua Jurutera bagi Negeri-Negeri Selat telah ditubuhkan.
                Pada masa itu Singapura merupakan pusat tahanan utama bagi banduan dari jajahan British di seluruh Timur Jauh. 
                Pihak British bergantung pada pihak askar untuk mengisi jawatan jurutera dan doktor. 
                </p>
                <div class="text-center">
                    <button class="btn btn-sejarah-jkr">Teruskan</button>
                </div>
            </div>
            <div class="col-6">
                <div class="parent">
                    <img class="image1" src="/assets/img/sjkr1.png" width="100" height="100"/>
                    <img class="image2" src="/assets/img/sjkr2.png" width="200" height="200"/>
                    <img class="image3" src="/assets/img/sjkr3.png" width="100" height="100"/>
                </div>
            </div>
          </div>
        </div>
        <div class="col" style="background-color: #F5E284; padding: 35px 70px;">
            <div class="row">
              <div class="col-6">
                <div class="parent">
                    <img class="image4" src="/assets/img/vjkr1.png" width="100" height="100"/>
                    <img class="image5" src="/assets/img/vjkr2.png" width="80" height="80"/>
                    <img class="image6" src="/assets/img/vjkr3.png" width="60" height="60"/>
                    <img class="image7" src="/assets/img/vjkr4.png" width="200" height="200"/>
                </div>
              </div>
              <div class="col-6">
                <h3 class="mt-4 mb-3 text-center" style="color: #8C271E;">Visi, Misi, Objektif, Fungsi & Profil JKR</h3>
                    <p style="text-align: center; color: #8C271E;">Kami akan menjadi pemberi perkhidmatan bertaraf dunia dan pusat kecemerlangan di dalam bidang pengurusan aset, pengurusan projek dan perkhidmatan kejuruteraan demi pembangunan infrastruktur negara 
                        melalui modal insan yang kreatif dan inovatif serta teknologi terkini.</p>
                    <div class="text-center">
                        <button class="btn btn-visi-jkr">Teruskan</button>
                    </div>              
            </div>
          </div>
        </div>
        <div class="col" style="background-color: #8DB368; padding: 90px 70px;">
            <div class="row">
                <div class="col-6">
                    <h3 class="text-white mt-4" style="text-align:center">Logo JKR</h3>
                    <p class="text-white" style="text-align: center">Kuning melambangkan kedewasaan jenama JKR sebagai salah 
                        sebuah organisasi yang tertua diwujudkan dan 
                        mencerminkan imej yang 
                        matang dalam mencapai objektifnya 
                    </p>
                    <div class="text-center">
                        <button class="btn btn-sejarah-jkr">Teruskan</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="parent">
                        <img class="image8" src="/assets/img/ljkr2.png" width="280" height="280"/>
                        <img class="image9" src="/assets/img/ljkr1.png" width="100" height="100"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-4" style="background-color: #FFFE8E; padding: 50px 10px;">
                    <h3 class="mt-4" style="text-align:center; color: #8C271E;">Carta Organisasi</h3>
                    <p style="text-align: center; color: #8C271E;">Carta Organisasi bagi Cawangan Alam Sekitar dan Kecekapan Tenaga 
                    </p>
                    <div class="text-center">
                        <button class="btn btn-kuning-jkr">Lihat</button>
                    </div>
                </div>
                <div class="col-4" style="background-color: #04A777; padding: 50px 10px;">
                    <h3 class="text-white mt-4" style="text-align:center">Piagam Pelanggan</h3>
                    <p class="text-white" style="text-align: center">Kuning melambangkan kedewasaan jenama JKR sebagai salah 
                        sebuah organisasi yang tertua diwujudkan dan 
                        mencerminkan imej yang 
                        matang dalam mencapai objektifnya 
                    </p>
                    <div class="text-center">
                        <button class="btn btn-hijau-jkr">Lihat</button>
                    </div>
                </div>
                <div class="col-4" style="background-color: #FFFE8E; padding: 50px 10px;">
                    <h3 class="mt-4" style="text-align:center; color: #8C271E;">Ketua Pegawai Maklumat (CIO)</h3>
                    <p style="text-align: center; color: #8C271E;">
                        Timbalan Ketua Pengarah Kerja Raya (Sektor Pakar)                         
                    </p>
                    <div class="text-center">
                        <button class="btn btn-kuning-jkr">Lihat</button>
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-4" style="background-color: #04DC9C; padding: 50px 10px;">
                    <h3 class="text-white mt-4" style="text-align:center">Senarai Cawangan</h3>
                    <p class="text-white" style="text-align: center;">Portfolio Pengurusan | Sektor Infra | Sektor Bangunan | Sektor Pakar 
                    </p>
                    <div class="text-center">
                        <button class="btn btn-cawangan-jkr">Lihat</button>
                    </div>
                </div>
                <div class="col-4" style="background-color: #FFFE8E; padding: 50px 10px;">
                    <h3 class="mt-4" style="text-align:center; color: #8C271E;">Senarai JKR Negeri & Wilayah</h3>
                    <p style="text-align: center; color: #8C271E;">
                        Pengarah JKR bagi setiap Negeri & Wilayah                         
                    </p>
                    <div class="text-center">
                        <button class="btn btn-kuning-jkr">Lihat</button>
                    </div>
                </div>
        </div>
   

    
<!--JavaScript-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
  $("#myBtn1").click(function() {
    $("#v-pills-project1-tab").trigger('click');
  });
  $("#myBtn2").click(function() {
    $("#v-pills-project2-tab").trigger('click');
  });
  $("#myBtn3").click(function() {
    $("#v-pills-project3-tab").trigger('click');
  });


});
</script>
        




@endsection