@extends('layouts.anon')
<style>
  /* .container {
      position: relative;
      text-align: left;
    } */
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

/* h4
{
  display: inline-block;
  text-align: center;
} */
  </style>

@section('content')

{{-- <div class="container-fluid"> --}}
  {{-- <div class="container"> --}}

        <div class="row mt-3">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
              <li class="nav-item">
              <a class="nav-link active" id="v-pills-project1-tab" data-toggle="pill" href="#tab1" role="tab">
                              Sejarah Penubuhan CASKT JKR
                          </a>
              </li>
              <a class="nav-link" id="v-pills-project2-tab" data-toggle="pill" href="#tab2" role="tab">
                              Visi, Misi, Objektif, Fungsi & Profil JKR
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab3" role="tab">
                              Logo JKR
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab4" role="tab">
                              Carta Organisasi
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab5" role="tab">
                              Piagam Pelanggan
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab6" role="tab">
                              Ketua Pegawai Maklumat (CIO)
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab7" role="tab">
                              Senarai Cawangan
                          </a>
              <a class="nav-link" id="v-pills-project3-tab" data-toggle="pill" href="#tab8" role="tab">
                              Senarai JKR Negeri & Wilayah
                          </a>            
            </div>
          </div>
          <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane active" id="tab1" role="tabpanel">
                <h1 class="mt-3 mb-3">Sejarah Penubuhan CASKT JKR</h1>
                <h3>2002</h3>
                <p class="mt-3" align="justify">
                  Cawangan Alam Sekitar (CAS) ditubuhkan. 
                </p>

                <h3>2008</h3>
                <p class="mt-3" align="justify">
                  Cawangan Alam Sekitar telah diubah
                  nama kepada Cawangan Alam Sekitar Dan Tenaga (CASKT) 
                </p>

                <h3>2011</h3>
                <p class="mt-3" align="justify">
                  Penambahan fungsi cawangan dengan
                  mengambil kira lain-lain
                  aspek kelestarian 
                </p>

                <h3>2015</h3>
                <p class="mt-3" align="justify">
                  CAST telah diubah nama kepada
                  Cawangan Alam Sekitar dan
                  Kecekapan Tenaga (CASKT) 
                </p>


                {{-- <h3>Peristiwa semasa</h3>
                <h3 class="mb-3">Public Works Department diwujudkan</h3>
    
                <img src="/assets/img/13.png" alt="Error" class="center" style="width: 100%">
                <p class="mt-3" align="justify">
                  Dalam tahun 1858 jawatan Ketua Jurutera bagi Negeri-Negeri Selat telah ditubuhkan. Pada masa itu Singapura merupakan pusat tahanan utama bagi banduan dari jajahan British di seluruh Timur Jauh. 
                  Pihak British bergantung pada pihak askar untuk mengisi jawatan jurutera dan doktor. Seorang pegawai askar pasukan kejuruteraan akan ditempatkan untuk mengepalai kerja-kerja awam di setiap jajahan. 
                  Berkenaan inilah Mejar McNair telah datang ke Singapura untuk mengisi jawatan tersebut. 
                </p>    
    
                <p class="mt-3" align="justify">
                  Pada tahun 1867 Negeri-Negeri Selat telah dijadikan 'Crown Colony' dan serentak dengan itu jawatan Penguasa PWD Singapura telah ditukarkan kepada Jurutera Jajahan Negeri-Negeri Selat. 
                  Walau bagaimanapun tarikh berkenaan tidak boleh diperkatakan sebagai permulaan PWD kerana pada dasarnya kerja-kerja hanya tertumpu di Singapura sahaja. 
                  Hanya selepas lima tahun kemudian iaitu pada tahun 1872, satu jabatan baru dinamakan PWD Negeri-Negeri Selat ditubuhkan.
                </p>
    
                <p class="mt-3" align="justify">
                  Ini adalah titik permulaan JKR sebagai satu organisasi di Malaysia. Mejar J.F.A. McNair yang sebelumnya memegang jawatan Jurutera Eksekutif dan Penguasa Banduan dan juga 
                  Jurutera Jajahan Negeri-Negeri Selat dalam tahun 1867 ialah orang pertama menerajui organisasi JKR pada tahun 1872 dengan Kapten Shatterthwaite sebagai Penolong Pertama Jurutera 
                  di peringkat Negeri Pulau Pinang.
                </p>
    
                <p class="mt-3" align="justify">
                  Jabatan Ukur yang.telah ditubuhkan pada tahun 1839 telah disatukan dengan pejabat Jurutera Jajahan pada tahun 1871, di bawah polisi penyatuan yang dimula gerakkan oleh 
                  Sir Harry Ord, di mana Mejar F.A. McNair telah memegang jawatan tersebut. Beliau telah menyusun semula jabatan pada tahun 1873 dengan menempatkan 
                  Kapten W. Innes sebagai Penolong Pertama Jurutera dan Juru Ukur di Negeri Pulau Pinang dan seorang lagi di Melaka.
                </p>
    
                <p class="mt-3" align="justify">
                  Pada tahun 1867 Negeri-Negeri Selat telah dijadikan 'Crown Colony' dan serentak dengan itu jawatan Penguasa PWD Singapura telah ditukarkan kepada Jurutera Jajahan Negeri-Negeri Selat. 
                  Walau bagaimanapun tarikh berkenaan tidak boleh diperkatakan sebagai permulaan PWD kerana pada dasarnya kerja-kerja hanya tertumpu di Singapura sahaja. 
                  Hanya selepas lima tahun kemudian iaitu pada tahun 1872, satu jabatan baru dinamakan PWD Negeri-Negeri Selat ditubuhkan.
                </p>
    
                <p class="mt-3" align="justify">
                  Pada tahun 1848 jawatan Penguasa Penjara telah diletakkan di bawah tanggungjawab Jurutera Jajahan para banduan telah 
                  digunakan untuk kerja-kerja pembinaan jalan dan bangunan. Jawatan ini dipegang oleh pihak Jabatan Kerja Raya sehingga tahun 
                  1873 di mana pihak Jabatan Penjara mempunyai penguasanya sendiri.
                </p>
    
                <p class="mt-3" align="justify">
                  Sehingga 31hb. Disember 1931 di Tanah Melayu terdapat dua Jabatan Kerja Raya yang berasingan. Jurutera Jajahan Negeri-Negeri Selat adalah bertanggungjawab bagi Negeri-Negeri Selat 
                  manakala Pengarah Kerja Raya, Negeri-Negeri Melayu Bersekutu bagi Negeri-Negeri Bersekutu dan seorang Jurutera dipinjamkan bagi menjalankan tugas-tugas untuk 
                  Negeri-Negeri Melayu Tidak Bersekutu.
                </p>
    
                <p class="mt-3" align="justify">
                  Pada 1hb. Januari 1932 kedua-dua jabatan telah disatukan menjadi satu Perkhidmatan Kerja Raya Malaya yang berpusat di Singapura dengan nama 'Pengarah Kerja Raya, Negeri-Negeri Selat' 
                  dan 'Penasihat Kerja Raya Negeri Melayu'.
                  Pada tarikh yang sama, cawangan hidrolik bagi Negeri-Negeri Bersekutu Jabatan Kerja Raya telah dijadikan satu jabatan yang berasingan digelar 
                  Perkhidmatan Parit dan Taliair diketuai oleh 'Pengarah Parit dan Taliair, Negeri-Negeri Selat dan Penasihat bagi Parit dan Taliair, Negeri-Negeri Melayu'.
                </p>
                <br>
                <br>
                <br>
    
                <h3>Ringkasan Sejarah JKR</h3>
                <p class="mt-3" align="justify">
                  1872 - PWD Negeri Pulau Pinang ditubuhkan dan diketuai oleh Major J.F.A McNair. <br>
                  Februari 1948 - Organisasi Jabatan Kerja Raya diubahsuai selepas Persekutuan Tanah  Melayu ditubuhkan. <br>
                  April 1951 - Jabatan Kerja Raya di bawah Portfolio Ahli untuk Kerja Raya dan Perumahan. <br>
                  Ogos 1955 - Jabatan ini di bawah Kementerian Kerja Raya. <br>
                  1956 - Diletakkan bawah Kementerian Kerja Raya Pos dan Telekom. <br>
                  1963 - Di bawah Kementerian Kerja Raya Pos, Tenaga dan Telekom. <br>
                  1976 - Kementerian Kerja Raya dan Kemudahan Awam. <br>
                  1983 - Berada bawah Kementerian Kerja Raya (sehingga kini).  <br>
                </p>
                <img src="/assets/img/14.png" alt="Error" width="300" height="300" align="right">
                <br>
                <img src="/assets/img/15.png" alt="Error" class="center" style="width: 100%">
    
    
                <h3 class="mt-3 mb-3">Senarai Lengkap Peneraju PWD / JKR</h3>
                <img src="/assets/img/16.png" alt="Error" class="center" style="width: 100%">
                <p class="mt-3" align="justify">
                  I. The Colonial Engineers who have been in charge of the Public Works Department since the colony was taken over from the Indian Government are :  
                  (Negeri-Negeri Selat (SS)- Melaka, Pulau Pinang dan Singapura)  
                </p>
                <p class="mt-3" align="justify">
                  1. Major J. F. A. McNair, R.A. (1867 to 1880)  (1881-1884 - acted by Mc Callum)
                </p>
                <p class="mt-3" align="justify">
                  2. Major Henry  Edward McCallum, R E., C.M.G.  1884-1897
                </p>
                <p class="mt-3" align="justify">
                  3. Colonel A. C. Alexander, R.E. (1897 to 1898) 
                </p>
                <p class="mt-3" align="justify">
                  4. Colonel Alexander Murray, C.E., Mem. Inst. C.E. (1898 -1909)
                </p>
                <p class="mt-3" align="justify">
                  5. Mr.F. J. Pigott (1910 -  1921)
                </p>
                <p class="mt-3" align="justify">
                  6. J.H.W. Park, O.B.E (1921  - 1926) 
                </p>
                <p class="mt-3" align="justify">
                  7. Harry Venus Towner (1927 – 1929)  
                </p>
                <p class="mt-3" align="justify">
                  II. The PWD of the Federated Malay States was established:
                  (Negeri-Negeri Melayu Bersekutu (FMS)- Pahang, Perak, Selangor dan Negeri Sembilan)
                </p>
                <p class="mt-3" align="justify">
                  8. Mr. F.St.G. Caufeild(1901-1907) 
                </p>
                <p class="mt-3" align="justify">
                  9. Mr. Robert Ogilvie Newton Anderson, B.A., A.I.B (1907-1919)  ** *
                </p>
                <p class="mt-3" align="justify">
                  10. Mr. J. Trump (1914 -      ) * ATAU MR. W. EYRE-KENNY (1910-1923)*.
                </p>
                <p class="mt-3" align="justify">
                  11. Mr. J. Strachan (1923 - 1924) 
                </p>
                <p class="mt-3" align="justify">
                  12. Mr. C.V.A. Espeut  (1925 - 1927)    
                </p>
                <p class="mt-3" align="justify">
                  13.  Leut-Colonel James Parry Swettenham  (1927-1931)       
                </p>
                <p class="mt-3" align="justify">
                  Kedua -dua Jabatan SS dan FMS  disatukan menjadi satu perkhidmatan Kerja Raya Malaya berpusat di 
                  Singapura dengan nama di Director of Public Works, SS and Adviser on Public Works, Malay States .
                </p>
                <p class="mt-3" align="justify">
                  14.  Mr. G. Sturrock (1931 -1935)         
                </p>
                <p class="mt-3" align="justify">
                  15.  Major R.L. Nunn (1935-1940)         
                </p>
                <p class="mt-3" align="justify">
                  Malayan Union
                </p>
                <p class="mt-3" align="justify">
                  16.  Mr. W. Fairley  (1946 - 1948)        
                </p>
                <p class="mt-3" align="justify">
                  III. Director of Public Works Department of Federation of Malaya:
                (PERSEKUTUAN TANAH MELAYU Terdiri daripada 11 negeri di Tanah Melayu (9 Negeri-negeri Melayu dan 2 penempatan British Pulau Pinang dan Melaka).
                </p>
                <p class="mt-3" align="justify">
                  17.  Mr. G. Edwards  (May 1948 - 1950)        
                </p>
                <p class="mt-3" align="justify">
                  18.  NANKIVELL Kenneth  (Ken Nankivell) B.Sc. D.I.C., A.M.I.C.E,  (1954-1957)          
                </p>
                <p class="mt-3" align="justify">
                  19.  R.E. Pitt (1958-1959)        
                </p>
                <p class="mt-3" align="justify">
                  20.  S.E Jewkes, O.B.E., J.M.N., B. Sc. (Eng), (1955-1962)        
                </p>
                <p class="mt-3" align="justify">
                  21.  S.F. Owens (1962-1964)        
                </p>
                <p class="mt-3" align="justify">
                  IV. Selepas Pembentukan Malaysia        
                </p>
                <p class="mt-3" align="justify">
                  22.  Tan Sri Ir. Haji Yusoff bin Haji Ibrahim (1/8/1964 - 21/7/1971)        
                </p>
                <p class="mt-3" align="justify">
                  23.  Ir. Thean Lip Thong (22/7/1971 - 14/4/1974)        
                </p>
                <p class="mt-3" align="justify">
                  24.  Tan Sri Dato' Ir. Mahfoz bin Khalid (17/4/1974 - 5/12/1977)        
                </p>
                <p class="mt-3" align="justify">
                  25.  Tan Sri Dato' Ir. Hj. Halaluddin bin Mohamed Ishak (6/12/1977-31/7/1981)        
                </p>
                <p class="mt-3" align="justify">
                  26.  Tan Sri Ir. Haji Mohd Yusoff bin Mohd Yunus (1/8/1981 - 27/10/1983)        
                </p>
                <p class="mt-3" align="justify">
                  27.  Dato' Ir. Ho Thian Hock (28/10/1983 - 9/12/1985)        
                </p>
                <p class="mt-3" align="justify">
                  28.  Tan Sri Dato' Ir. Talha bin Mohd Hashim (10/12/1985 - 9/9/1990)        
                </p>
                <p class="mt-3" align="justify">
                  29.  Tan Sri Dato' Ir. Wan Abd Rahman bin Haji Yaacob (10/9/1990 - 20/6/1996)        
                </p>
                <p class="mt-3" align="justify">
                  30.  Tan Sri Dato' Ir. Omar bin Ibrahim (21/6/1996 - 9/9/1999)        
                </p>
                <p class="mt-3" align="justify">
                  31.  Tan Sri Dato' Ir. Haji Zaini bin Omar (10/9/1999 - 1/6/2005)        
                </p>
                <p class="mt-3" align="justify">
                  32.  Dato' Sri Ir. Dr. Wahid bin Omar (7/6/2005 - 30/4/2007)        
                </p>
                <p class="mt-3" align="justify">
                  33.  Dato' Sri Ir. Dr. Judin bin Abdul Karim (1/5/2007 - 30/4/2011)        
                </p>
                <p class="mt-3" align="justify">
                  34.  Dato' Seri Ir. Hj. Mohd Noor bin Yaacob (1/5/2011-31/3/2014)        
                </p>
                <p class="mt-3" align="justify">
                  35.  Dato' Ir. Annies Bin Md Ariff (31/3/2014- 30/4/2015)        
                </p>
                <p class="mt-3" align="justify">
                  36.  Datuk Ir. Adanan bin Mohamed Hussain (1/7/2015 - 8/6/2016)        
                </p>
                <p class="mt-3" align="justify">
                  37.  Dato' Sri Ir. Dr. Roslan bin Md Taha (24 Ogos 2016 - Mac 2019)        
                </p>
                <p class="mt-3" align="justify">
                  38. Dato' Ir. Dr. Meor Abdul Aziz bin Haji Osman (25 April 2019)        
                </p>
                <p class="mt-3" align="justify">
                  39. Ir. Kamaluddin bin Abdul Rashid (22 November 2019)        
                </p>
                <p class="mt-3" align="justify">
                  40. Dato' Seri Ir. Haji Mohamad Zulkefly bin Sulaiman (24 Julai 2020)        
                </p> --}}
              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel">
                <h1 class="mt-3">VISI, MISI, OBJEKTIF, FUNGSI & PROFIL JKR </h1>
                <p class="mt-6 mb-6" style="text-align: center">
                  Bagi mencapai hasrat negara di dalam memberi perkhidmatan yang terbaik kepada rakyat, 
                  JKR menzahirkanya melalui visi dan misi jabatan ini iaitu: 
                </p>
                  <div class="col" style="background-color: #0F5E31">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="text-white mt-4 mb-3">Visi</h3>
                        <p class="text-white justify">Kami akan menjadi pemberi perkhidmatan bertaraf dunia dan pusat kecemerlangan di dalam bidang pengurusan aset, pengurusan projek dan perkhidmatan kejuruteraan demi pembangunan infrastruktur negara 
                          melalui modal insan yang kreatif dan inovatif serta teknologi terkini.</p>
                      </div>
                      <div class="col-6">
                        <img src="/assets/img/20.png" alt="Error" width="300" height="300">
                      </div>
                    </div>
                  </div>
                  <div class="col" style="background-color: #EB5500">
                    <div class="row">
                      <div class="col-6">
                        <img src="/assets/img/21.png" alt="Error" width="300" height="300">
                      </div>
                      <div class="col-6">
                        <h3 class="text-white mt-4">Misi</h3>
                        <p class="text-white justify">JKR menyumbang kepada pembangunan negara melalui : <br>
                          •	Membantu pelanggan dalam menyampaikan hasil polisi dan perkhidmatan melalui kerjasama rakan kongsi strategik <br>
                          •	Pemiawaian proses-proses dan sistem demi penyampaian hasil yang konsisten <br>
                          •	Menyediakan pengurusan aset dan projek yang berkesan dan inovatif <br>
                          •	Memperkasa kompetensi kejuruteraan sedia ada <br>
                          •	Membangunkan modal insan dan kompetensi-kompetensi baru <br>
                          •	Berpegang teguh kepada integriti dalam menyampaikan perkhidmatan <br>
                          •	Membina hubungan yang harmoni dengan komuniti <br>
                          •	Memelihara persekitaran di dalam penyampaian perkhidmatan <br>
                          </p>
                      </div>
                  </div>
                </div>
      
                <h3 class="mt-6" style="text-align: center">Objektif</h3>
                <p class="mt-3 justify" style="text-align: center">
                  Sebagai Perunding Utama kepada Kerajaan Malaysia, objektif Jabatan Kerja Raya adalah untuk:
                </p>
                <strong>"Menyerahkan produk dan melaksanakan perkhidmatan penyenggaraan yang menepati masa, kualiti dan kos yang ditetapkan bagi mencapai faedah aset yang optimum".</strong>
      
                <div class="inline-div">
                    <h4>Fungsi</h4>
                    <p>JKR diwujudkan untuk :</p>
                    <p class="justify">
                      • Berfungsi sebagai rakan kongsi strategik kepada pelanggan kami dalam mencapai keberhasilan polisi kerajaan <br>
                      •	Menjadi peneraju di dalam bidang pengurusan aset, pengurusan projek dan kecemerlangan kejuruteraan untuk negara <br>
                      •	Menyediakan infrastruktur negara
                      </p>
                    <h4>Profil</h4>
                    <p class="justify">
                      Jabatan Kerja Raya (JKR) Malaysia telah ditubuhkan sejak 1872 dan berfungsi sebagai sebuah agensi teknikal kepada Kerajaan Malaysia. JKR berperanan melaksanakan projek-projek pembangunan dan penyenggaraan infrastruktur kepada pelbagai kementerian, jabatan, badan berkanun dan 
                      kerajaan negeri seperti jalan, bangunan, lapangan terbang, pelabuhan dan jeti.
                    </p>
                </div>
              </div>
              <div class="tab-pane fade" id="tab3" role="tabpanel">
                <h1>Logo JKR</h1>
                <img src="/assets/img/JKR_LOGO.png" alt="Error" width="547" height="368.65">
              </div>
              <div class="tab-pane fade" id="tab4" role="tabpanel">
                <h1>Logo JKR</h1>
                <img src="/assets/img/JKR_LOGO.png" alt="Error" width="547" height="368.65">
              </div>
              <div class="tab-pane fade" id="tab5" role="tabpanel">
                <div class="col mt-2 text-center">
                  <h3 class="mt-5">Piagam Pelanggan</h3>
                  <p>There is no one who loves pain itself, who seeks after it and wants to have it, simply because </p>
                </div>
              
                <div class="col" style="background-color: rgb(20, 64, 8)">
                    <div class="col">
                        <img src="/assets/img/Piagam.png" alt="error" width="600" height="900">
                    </div>
                    <div class="col mt-4 text-center">
                        <p class="text-white mb-3">Sila muat turun di sini</p>
                        <button class="btn btn-primary mb-3">Muat Turun</button>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab6" role="tabpanel">
                <div class="col row">
                  <div class="col-6 mt-5">
                      <img src="/assets/img/picture1.png" alt="Error" width="300" height="300">
                  </div>
                  <div class="col-6 mt-5">
                      <div class="col">
                          <h6 class="text-bold">
                              Ketua Pegawai Maklumat (CIO)
                          </h6>
                          <p>YBs. Sir. Amran bin Mohd Majid <br>Timbalan Ketua Pengarah Kerja Raya Malaysia  (Sektor Pakar)</p>
                          
                      </div>
                      <div class="col">
                          <h6 class="text-bold">
                              Alamat Pejabat
                          </h6>
                          <p>Pejabat Timbalan Ketua Pengarah Kerja Raya (Sektor Pakar) <br>Tingkat 33, Menara Kerja Raya (Blok G) <br>Ibu Pejabat JKR, Jalan Sultan Salahuddin, <br>50480 Kuala Lumpur</p>
                          <p><i class="fas fa-blender-phone"></i>03-26188433 <br><i class="fas fa-blender-phone"></i>03-26188433</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab7" role="tabpanel">
                <h2 class="text-bold mt-4">Senarai Cawangan</h2>
    
                <div class="col mt-3">
                    <h4>Portfolio Pengurusan</h4>
                    <div class="col">
                        <button class="btn btn-primary">Cawangan Dasar & Pengurusan Korporat</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Perancangan Aset Bersepadu</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Pusat Kecemerlangan Kejuruteraan & Teknologi</button>
                    </div>
                </div>
    
                <div class="col mt-3">
                    <h4>Sektor Infra</h4>
                    <div class="col">
                        <button class="btn btn-primary">Cawangan Jalan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Infrastruktur Pengangkutan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Cerun</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Selenggara Fasiliti Jalan</button>
                    </div>
                </div>
    
                <div class="col mt-3">
                    <h4>Sektor Bangunan</h4>
                    <div class="col">
                        <button class="btn btn-primary">Cawangan Kerja Bangunan Am 1</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kerja Bangunan Am 2</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kerja Pendidikan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kerja Keselamatan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kerja Kesihatan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kerja Senggara Fasiliti Bangunan</button>
                    </div>
                </div>
    
                <div class="col mt-3">
                    <h4>Sektor Pakar</h4>
                    <div class="col">
                        <button class="btn btn-primary">Cawangan Arkitek</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Awam & Struktur</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kontrak & Ukur Bahan</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Mekanikal</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Elektrik</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Kejuruteraan Geoteknik</button>
                    </div>
                    <div class="col mt-2">
                        <button class="btn btn-primary">Cawangan Alam Sekitar & Kecekapan Tenaga</button>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab8" role="tabpanel">
                <div class="col">
                  <div class="col mt-6 mb-4">
                      <h3 class="text-bold">Senarai JKR Negeri & Wilayah</h3>
                  </div>
                  <div class="col">
                      <div class="col">
                          <div class="row">
                              <div class="col-4">
                                  <div class="card">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_pahang" class="btn btn-primary">JKR Pahang</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_johor" class="btn btn-primary">JKR Johor</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_perak" class="btn btn-primary">JKR Perak</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_kelantan" class="btn btn-primary">JKR Kelantan</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_selangor" class="btn btn-primary">JKR Selangor</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_wp_labuan" class="btn btn-primary">JKR WP Labuan</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="row">
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_negeri_sembilan" class="btn btn-primary">JKR Negeri Sembilan</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_wp_kl" class="btn btn-primary">JKR WP KL</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_wp_putrajaya" class="btn btn-primary">JKR WP Putrajaya</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_terengganu" class="btn btn-primary">JKR Terengganu</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_pinang" class="btn btn-primary">JKR P. Pinang</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_melaka" class="btn btn-primary">JKR Melaka</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="row">
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_kedah" class="btn btn-primary">JKR Kedah</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_perlis" class="btn btn-primary">JKR Perlis</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_sabah" class="btn btn-primary">JKR Sabah</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="card mt-2">
                                      <div class="card-body">
                                        <a href="/abouNegeri/jkr_sarawak" class="btn btn-primary">JKR Sarawak</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
  {{-- </div> --}}

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
        {{-- <div class="col" style="background-color: #5B8E7D; padding: 35px 70px;">
          <div class="row">
            <div class="col-6">
                <h3 class="text-white mt-4" style="text-align:center">Sejarah JKR</h3>
                <p class="text-white" style="text-align: center">Dalam tahun 1858 jawatan Ketua Jurutera bagi Negeri-Negeri Selat telah ditubuhkan.
                Pada masa itu Singapura merupakan pusat tahanan utama bagi banduan dari jajahan British di seluruh Timur Jauh. 
                Pihak British bergantung pada pihak askar untuk mengisi jawatan jurutera dan doktor. 
                </p>
                <div class="text-center">
                    <a href="#tab1"><button class="btn btn-sejarah-jkr">Teruskan</button></a>
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
                      <a href="/about#tab2"><button class="btn btn-visi-jkr">Teruskan</button></a>
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
        </div> --}}

{{-- </div> --}}





<!--JavaScript-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
  $("#myBtn1").click(function() {
    $("#tab1").trigger('click');
  });
  $("#myBtn2").click(function() {
    $("#tab2").trigger('click');
  });
  $("#myBtn3").click(function() {
    $("#tab3").trigger('click');
  });


});
</script>
<!--Pagination using button JavaScript-->
<script>
  $(document).ready(function () {
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();
  });

  function button1() {
      $('.pg-1').show();
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();

  }
  function button2() {
      $('.pg-2').show();
      $('.pg-1').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();
  }
  function button3() {
      $('.pg-3').show();
      $('.pg-1').hide();
      $('.pg-2').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();
  }
  function button4() {
      $('.pg-4').show();
      $('.pg-1').hide();
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();
  }
  function button5() {
      $('.pg-5').show();
      $('.pg-1').hide();
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-6').hide();
      $('.pg-7').hide();
  }
  function button6() {
      $('.pg-6').show();
      $('.pg-1').hide();
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-7').hide();
  }
  function button7() {
      $('.pg-7').show();
      $('.pg-1').hide();
      $('.pg-2').hide();
      $('.pg-3').hide();
      $('.pg-4').hide();
      $('.pg-5').hide();
      $('.pg-6').hide();
  }
</script>


        

  










@endsection