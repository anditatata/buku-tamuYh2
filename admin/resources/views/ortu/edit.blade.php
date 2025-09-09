@extends('layouts.app')

@section('title', 'Edit Orang Tua')
@section('page-title', 'Edit Data Orang Tua')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-8">Form Edit Tamu Orang Tua</h2>
            
            @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
        <ul class="list-disc pl-5 space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <form method="POST" action="{{ route('ortu.update', $ortu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Orang Tua -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Orang Tua <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama_orangtua" 
                               value="{{ old('nama_orangtua', $ortu->nama_orangtua) }}"
                               placeholder="Masukkan nama lengkap orang tua"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               required>
                    </div>

                    <!-- Nama Siswa -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Siswa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama_siswa" 
                               value="{{ old('nama_siswa', $ortu->nama_siswa) }}"
                               placeholder="Masukkan nama lengkap siswa"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               required>
                    </div>

                    <!-- Kelas -->
                  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Kelas <span class="text-red-500">*</span>
    </label>
    <select name="kelas" 
            class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
        <option value="">-- Pilih Kelas --</option>

  <!-- kelas 10 -->
  <option value="X RPL 1">X RPL 1 </option>
  <option value="X RPL 2">X RPL 2</option>
  <option value="X TKJ 1">X TKJ 1</option>
  <option value="X TKJ 2">X TKJ 2</option>
  <option value="X TKJ 3">X TKJ 3 </option>
  <option value="X KA 1">X KA 1</option>
  <option value="X KA 2">X KA 2</option>
  <option value="X KA 3">X KA 3</option>
  <option value="X KA 4">X KA 4</option>
  <option value="X KA 5">X KA 5</option>
  <option value="X KA 6">X KA 6</option>
  
  <!-- kelas 11 -->
  <option value="XI RPL 1">XI RPL 1</option>
  <option value="XI RPL 2">XI RPL 2</option>
  <option value="XI TKJ 1">XI TKJ 2</option>
  <option value="XI TKJ 2">XI TKJ 2</option>
  <option value="XI TKJ 2">XI TKJ 3</option>
  <option value="XI KA 1">XI KA 1</option>
  <option value="XI KA 2">XI KA 2</option>
  <option value="XI KA 3">XI KA 3</option>
  <option value="XI KA 4">XI KA 4</option>
  <option value="XI KA 5">XI KA 5</option>
  <option value="XI KA 6">XI KA 6</option>

 <!-- kelas 12 -->
  <option value="XII RPL 1">XII RPL 1</option>
  <option value="XII RPL 2">XII RPL 2</option>
  <option value="XII TKJ 1">XII TKJ 1</option>
  <option value="XII TKJ 2">XII TKJ 2</option>
  <option value="XII TKJ 3">XII TKJ 3</option>
  <option value="XII KA 1">XII KA 1</option>
  <option value="XII KA 2">XII KA 2</option>
  <option value="XII KA 3">XII KA 3</option>
  <option value="XII KA 4">XII KA 4</option>
  <option value="XII KA 5">XII KA 5</option>
  <option value="XII KA 6">XII KA 6</option>
 
  <!-- kelas 13 -->
  <option value="XIII KA 1">XIII KA 1</option>
  <option value="XIII KA 2">XIII KA 2</option>
  <option value="XIII KA 3">XIII KA 3</option>
  <option value="XIII KA 4">XIII KA 4</option>
  <option value="XIII KA 5">XIII KA 5</option>
  <option value="XIII KA 6">XIII KA 6</option>
    </select>
</div>  

                     <!-- alamat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat" 
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                  required>{{ old('alamat', $ortu->alamat) }}</textarea>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kontak <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="kontak" 
                               value="{{ old('kontak', $ortu->kontak) }}"
                               placeholder="Nomor telepon atau email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               required>
                    </div>

                             <!-- guru dituju -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Guru Yang Dituju <span class="text-red-500">*</span>
                        </label>
                        <select name="guru_dituju"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                            <option value="">-- Pilih Guru --</option>
                            <option value="A.R Fauzan, S.Ip. M.M" {{ old('guru_dituju', $ortu->guru_dituju) == 'A.R Fauzan, S.Ip. M.M' ? 'selected' : '' }}>A.R Fauzan, S.Ip. M.M</option>
                            <option value="Ade Hartono, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ade Hartono, S.Pd' ? 'selected' : '' }}>Ade Hartono, S.Pd</option>
                            <option value="Ade Rahmat Nugraha" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ade Rahmat Nugraha' ? 'selected' : '' }}>Ade Rahmat Nugraha</option>
                            <option value="Adiwiguna, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Adiwiguna, S.Pd' ? 'selected' : '' }}>Adiwiguna, S.Pd</option>
                            <option value="Ahmad Saripuloh" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ahmad Saripuloh' ? 'selected' : '' }}>Ahmad Saripuloh</option>
                            <option value="Anggita Septiani, S.T.P, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Anggita Septiani, S.T.P, M.Pd' ? 'selected' : '' }}>Anggita Septiani, S.T.P, M.Pd</option>
                            <option value="Annisa Intikarusdiansari, S.Pd." {{ old('guru_dituju', $ortu->guru_dituju) == 'Annisa Intikarusdiansari, S.Pd.' ? 'selected' : '' }}>Annisa Intikarusdiansari, S.Pd.</option>
                            <option value="Apriliani Hardiyanti Hariyono, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Apriliani Hardiyanti Hariyono, S.Pd' ? 'selected' : '' }}>Apriliani Hardiyanti Hariyono, S.Pd</option>
                            <option value="Ariantonius Sagala, S.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ariantonius Sagala, S.Kom' ? 'selected' : '' }}>Ariantonius Sagala, S.Kom</option>
                            <option value="Asep Saleh, S.E" {{ old('guru_dituju', $ortu->guru_dituju) == 'Asep Saleh, S.E' ? 'selected' : '' }}>Asep Saleh, S.E</option>
                            <option value="Atep Aulia Rahman, S.T. M.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Atep Aulia Rahman, S.T. M.Kom' ? 'selected' : '' }}>Atep Aulia Rahman, S.T. M.Kom</option>
                            <option value="Cecep Suryana, S.Si" {{ old('guru_dituju', $ortu->guru_dituju) == 'Cecep Suryana, S.Si' ? 'selected' : '' }}>Cecep Suryana, S.Si</option>
                            <option value="Dadan Rukma" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dadan Rukma' ? 'selected' : '' }}>Dadan Rukma</option>
                            <option value="Dian Dawan, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dian Dawan, S.Pd' ? 'selected' : '' }}>Dian Dawan, S.Pd</option>
                            <option value="Danty, S.Pd." {{ old('guru_dituju', $ortu->guru_dituju) == 'Danty, S.Pd.' ? 'selected' : '' }}>Danty, S.Pd.</option>
                            <option value="Dede Saepudin, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dede Saepudin, S.Pd' ? 'selected' : '' }}>Dede Saepudin, S.Pd</option>
                            <option value="Dedi Efendi, S.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dedi Efendi, S.Kom' ? 'selected' : '' }}>Dedi Efendi, S.Kom</option>
                            <option value="Dedi Jaenudin" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dedi Jaenudin' ? 'selected' : '' }}>Dedi Jaenudin</option>
                            <option value="Dena Handriana, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dena Handriana, M.Pd' ? 'selected' : '' }}>Dena Handriana, M.Pd</option>
                            <option value="Desta Mulyanti, S.Sn" {{ old('guru_dituju', $ortu->guru_dituju) == 'Desta Mulyanti, S.Sn' ? 'selected' : '' }}>Desta Mulyanti, S.Sn</option>
                            <option value="Dicky Zulkarnaen" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dicky Zulkarnaen' ? 'selected' : '' }}>Dicky Zulkarnaen</option>
                            <option value="Dini Karomna, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dini Karomna, S.Pd' ? 'selected' : '' }}>Dini Karomna, S.Pd</option>
                            <option value="Dr. Ermawati, M.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dr. Ermawati, M.Kom' ? 'selected' : '' }}>Dr. Ermawati, M.Kom</option>
                            <option value="Dr. Hj. Yani Heryani, M.M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dr. Hj. Yani Heryani, M.M.Pd' ? 'selected' : '' }}>Dr. Hj. Yani Heryani, M.M.Pd</option>
                            <option value="Dr. Sudarmi, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dr. Sudarmi, M.Pd' ? 'selected' : '' }}>Dr. Sudarmi, M.Pd</option>
                            <option value="Dra. Mimy Ardiany, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dra. Mimy Ardiany, M.Pd' ? 'selected' : '' }}>Dra. Mimy Ardiany, M.Pd</option>
                            <option value="Dra. Rahmi Dalilah Fitrianni" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dra. Rahmi Dalilah Fitrianni' ? 'selected' : '' }}>Dra. Rahmi Dalilah Fitrianni</option>
                            <option value="Dra. Weni Asmaraeni" {{ old('guru_dituju', $ortu->guru_dituju) == 'Dra. Weni Asmaraeni' ? 'selected' : '' }}>Dra. Weni Asmaraeni</option>
                            <option value="Ela Nurlaela, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ela Nurlaela, S.Pd' ? 'selected' : '' }}>Ela Nurlaela, S.Pd</option>
                            <option value="Endah Permatasari" {{ old('guru_dituju', $ortu->guru_dituju) == 'Endah Permatasari' ? 'selected' : '' }}>Endah Permatasari</option>
                            <option value="Endang Misnam" {{ old('guru_dituju', $ortu->guru_dituju) == 'Endang Misnam' ? 'selected' : '' }}>Endang Misnam</option>
                            <option value="Endang Sunandar, S.Pd., M.Pkim" {{ old('guru_dituju', $ortu->guru_dituju) == 'Endang Sunandar, S.Pd., M.Pkim' ? 'selected' : '' }}>Endang Sunandar, S.Pd., M.Pkim</option>
                            <option value="Eti Ariesanti, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Eti Ariesanti, S.Pd' ? 'selected' : '' }}>Eti Ariesanti, S.Pd</option>
                            <option value="Eva Zulva, S.Kom,I" {{ old('guru_dituju', $ortu->guru_dituju) == 'Eva Zulva, S.Kom,I' ? 'selected' : '' }}>Eva Zulva, S.Kom,I</option>
                            <option value="Fahira Armi Ramadhani, S.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Fahira Armi Ramadhani, S.T' ? 'selected' : '' }}>Fahira Armi Ramadhani, S.T</option>
                            <option value="Fertika, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Fertika, S.Pd' ? 'selected' : '' }}>Fertika, S.Pd</option>
                            <option value="Gina Urfah Mastur Sadili, S.Pd." {{ old('guru_dituju', $ortu->guru_dituju) == 'Gina Urfah Mastur Sadili, S.Pd.' ? 'selected' : '' }}>Gina Urfah Mastur Sadili, S.Pd.</option>
                            <option value="Halida Farhani, S.Psi" {{ old('guru_dituju', $ortu->guru_dituju) == 'Halida Farhani, S.Psi' ? 'selected' : '' }}>Halida Farhani, S.Psi</option>
                            <option value="Hasan As'ari, M.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == "Hasan As'ari, M.Kom" ? 'selected' : '' }}>Hasan As'ari, M.Kom</option>
                            <option value="Hazar Nurbani, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Hazar Nurbani, M.Pd' ? 'selected' : '' }}>Hazar Nurbani, M.Pd</option>
                            <option value="Hendra" {{ old('guru_dituju', $ortu->guru_dituju) == 'Hendra' ? 'selected' : '' }}>Hendra</option>
                            <option value="Heni Juhaeni, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Heni Juhaeni, S.Pd' ? 'selected' : '' }}>Heni Juhaeni, S.Pd</option>
                            <option value="Iah Robiah, S.Pd. Kim." {{ old('guru_dituju', $ortu->guru_dituju) == 'Iah Robiah, S.Pd. Kim.' ? 'selected' : '' }}>Iah Robiah, S.Pd. Kim.</option>
                            <option value="Ina Marina, S.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ina Marina, S.T' ? 'selected' : '' }}>Ina Marina, S.T</option>
                            <option value="Indira Sari Paputungan, M.Ed. Gr" {{ old('guru_dituju', $ortu->guru_dituju) == 'Indira Sari Paputungan, M.Ed. Gr' ? 'selected' : '' }}>Indira Sari Paputungan, M.Ed. Gr</option>
                            <option value="Indra Adiguna, S.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Indra Adiguna, S.T' ? 'selected' : '' }}>Indra Adiguna, S.T</option>
                            <option value="Iwan Setiawan" {{ old('guru_dituju', $ortu->guru_dituju) == 'Iwan Setiawan' ? 'selected' : '' }}>Iwan Setiawan</option>
                            <option value="Jaya Sumpena, M.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Jaya Sumpena, M.Kom' ? 'selected' : '' }}>Jaya Sumpena, M.Kom</option>
                            <option value="Kania Dewi Waluya, S.S.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Kania Dewi Waluya, S.S.T' ? 'selected' : '' }}>Kania Dewi Waluya, S.S.T</option>
                            <option value="Kiki Aima Mu'mina, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == "Kiki Aima Mu'mina, S.Pd" ? 'selected' : '' }}>Kiki Aima Mu'mina, S.Pd</option>
                            <option value="Lia Yulianti, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Lia Yulianti, M.Pd' ? 'selected' : '' }}>Lia Yulianti, M.Pd</option>
                            <option value="Maspuri Andewi, S.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Maspuri Andewi, S.Kom' ? 'selected' : '' }}>Maspuri Andewi, S.Kom</option>
                            <option value="Maya Kusmayanti, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Maya Kusmayanti, M.Pd' ? 'selected' : '' }}>Maya Kusmayanti, M.Pd</option>
                            <option value="Meli Novita, M.M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Meli Novita, M.M.Pd' ? 'selected' : '' }}>Meli Novita, M.M.Pd</option>
                            <option value="Mira Apriyani" {{ old('guru_dituju', $ortu->guru_dituju) == 'Mira Apriyani' ? 'selected' : '' }}>Mira Apriyani</option>
                            <option value="Muchamad Harry Ismail, S.T.R.Kom, M.M" {{ old('guru_dituju', $ortu->guru_dituju) == 'Muchamad Harry Ismail, S.T.R.Kom, M.M' ? 'selected' : '' }}>Muchamad Harry Ismail, S.T.R.Kom, M.M</option>
                            <option value="Nadia Afriliani, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nadia Afriliani, S.Pd' ? 'selected' : '' }}>Nadia Afriliani, S.Pd</option>
                            <option value="Neneng Suhartini, S.Si, S.Pd. Gr" {{ old('guru_dituju', $ortu->guru_dituju) == 'Neneng Suhartini, S.Si, S.Pd. Gr' ? 'selected' : '' }}>Neneng Suhartini, S.Si, S.Pd. Gr</option>
                            <option value="Nina Dewi Koswara, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nina Dewi Koswara, S.Pd' ? 'selected' : '' }}>Nina Dewi Koswara, S.Pd</option>
                            <option value="Nofa Nirawati, S.Pd, M.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nofa Nirawati, S.Pd, M.T' ? 'selected' : '' }}>Nofa Nirawati, S.Pd, M.T</option>
                            <option value="Nogi Muharam, S.Kom." {{ old('guru_dituju', $ortu->guru_dituju) == 'Nogi Muharam, S.Kom.' ? 'selected' : '' }}>Nogi Muharam, S.Kom.</option>
                            <option value="Nur Fauziyah Rahmawati, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nur Fauziyah Rahmawati, S.Pd' ? 'selected' : '' }}>Nur Fauziyah Rahmawati, S.Pd</option>
                            <option value="Nurlaela, Sh" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nurlaela, Sh' ? 'selected' : '' }}>Nurlaela, Sh</option>
                            <option value="Nurul Diningsih, S.Hum" {{ old('guru_dituju', $ortu->guru_dituju) == 'Nurul Diningsih, S.Hum' ? 'selected' : '' }}>Nurul Diningsih, S.Hum</option>
                            <option value="Octavina Sopamena, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Octavina Sopamena, M.Pd' ? 'selected' : '' }}>Octavina Sopamena, M.Pd</option>
                            <option value="Odang Supriatna, S.E." {{ old('guru_dituju', $ortu->guru_dituju) == 'Odang Supriatna, S.E.' ? 'selected' : '' }}>Odang Supriatna, S.E.</option>
                            <option value="Oman Somana, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Oman Somana, M.Pd' ? 'selected' : '' }}>Oman Somana, M.Pd</option>
                            <option value="Popong Wariati, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Popong Wariati, S.Pd' ? 'selected' : '' }}>Popong Wariati, S.Pd</option>
                            <option value="Pratiwi, S.S.I" {{ old('guru_dituju', $ortu->guru_dituju) == 'Pratiwi, S.S.I' ? 'selected' : '' }}>Pratiwi, S.S.I</option>
                            <option value="Priyo Hadisuryo, S.S.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Priyo Hadisuryo, S.S.T' ? 'selected' : '' }}>Priyo Hadisuryo, S.S.T</option>
                            <option value="Rakiman" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rakiman' ? 'selected' : '' }}>Rakiman</option>
                            <option value="Rani Rabiussani, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rani Rabiussani, M.Pd' ? 'selected' : '' }}>Rani Rabiussani, M.Pd</option>
                            <option value="Regina Fitrie, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Regina Fitrie, S.Pd' ? 'selected' : '' }}>Regina Fitrie, S.Pd</option>
                            <option value="Ricky Valentine" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ricky Valentine' ? 'selected' : '' }}>Ricky Valentine</option>
                            <option value="Rina Daryani, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rina Daryani, M.Pd' ? 'selected' : '' }}>Rina Daryani, M.Pd</option>
                            <option value="Rini Dwiwahyuni, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rini Dwiwahyuni, S.Pd' ? 'selected' : '' }}>Rini Dwiwahyuni, S.Pd</option>
                            <option value="Riska Fitriyanti, A.Md" {{ old('guru_dituju', $ortu->guru_dituju) == 'Riska Fitriyanti, A.Md' ? 'selected' : '' }}>Riska Fitriyanti, A.Md</option>
                            <option value="Rita Hartati, S.Pd, M.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rita Hartati, S.Pd, M.T' ? 'selected' : '' }}>Rita Hartati, S.Pd, M.T</option>
                            <option value="Roby Ismail Adi Putra, S.A.P" {{ old('guru_dituju', $ortu->guru_dituju) == 'Roby Ismail Adi Putra, S.A.P' ? 'selected' : '' }}>Roby Ismail Adi Putra, S.A.P</option>
                            <option value="Ruhya, S.Ag, M.M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ruhya, S.Ag, M.M.Pd' ? 'selected' : '' }}>Ruhya, S.Ag, M.M.Pd</option>
                            <option value="Rukmana, S.Pd.I" {{ old('guru_dituju', $ortu->guru_dituju) == 'Rukmana, S.Pd.I' ? 'selected' : '' }}>Rukmana, S.Pd.I</option>
                            <option value="Sabila Fauziyya, S.Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Sabila Fauziyya, S.Kom' ? 'selected' : '' }}>Sabila Fauziyya, S.Kom</option>
                            <option value="Safitri Insani, S.T.P" {{ old('guru_dituju', $ortu->guru_dituju) == 'Safitri Insani, S.T.P' ? 'selected' : '' }}>Safitri Insani, S.T.P</option>
                            <option value="Samsudin, S.Ag" {{ old('guru_dituju', $ortu->guru_dituju) == 'Samsudin, S.Ag' ? 'selected' : '' }}>Samsudin, S.Ag</option>
                            <option value="Santika, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Santika, M.Pd' ? 'selected' : '' }}>Santika, M.Pd</option>
                            <option value="Sarinah Br Ginting, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Sarinah Br Ginting, M.Pd' ? 'selected' : '' }}>Sarinah Br Ginting, M.Pd</option>
                            <option value="Shendy Antariksa, S.Hum" {{ old('guru_dituju', $ortu->guru_dituju) == 'Shendy Antariksa, S.Hum' ? 'selected' : '' }}>Shendy Antariksa, S.Hum</option>
                            <option value="Sugiyatmi, S.Si" {{ old('guru_dituju', $ortu->guru_dituju) == 'Sugiyatmi, S.Si' ? 'selected' : '' }}>Sugiyatmi, S.Si</option>
                            <option value="Sukmawidi, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Sukmawidi, S.Pd' ? 'selected' : '' }}>Sukmawidi, S.Pd</option>
                            <option value="Syafitri Kurniati Arief, S.Pd, M.T" {{ old('guru_dituju', $ortu->guru_dituju) == 'Syafitri Kurniati Arief, S.Pd, M.T' ? 'selected' : '' }}>Syafitri Kurniati Arief, S.Pd, M.T</option>
                            <option value="Taufik Hidayat, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Taufik Hidayat, M.Pd' ? 'selected' : '' }}>Taufik Hidayat, M.Pd</option>
                            <option value="Tessa Eka Yuniar, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Tessa Eka Yuniar, S.Pd' ? 'selected' : '' }}>Tessa Eka Yuniar, S.Pd</option>
                            <option value="Tini Rosmayani, S.Si" {{ old('guru_dituju', $ortu->guru_dituju) == 'Tini Rosmayani, S.Si' ? 'selected' : '' }}>Tini Rosmayani, S.Si</option>
                            <option value="Tita Heriyanti, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Tita Heriyanti, S.Pd' ? 'selected' : '' }}>Tita Heriyanti, S.Pd</option>
                            <option value="Tita Lismayanti, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Tita Lismayanti, S.Pd' ? 'selected' : '' }}>Tita Lismayanti, S.Pd</option>
                            <option value="Tiyas Rizkia, S.Li." {{ old('guru_dituju', $ortu->guru_dituju) == 'Tiyas Rizkia, S.Li.' ? 'selected' : '' }}>Tiyas Rizkia, S.Li.</option>
                            <option value="Tubagus Saputra, M.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Tubagus Saputra, M.Pd' ? 'selected' : '' }}>Tubagus Saputra, M.Pd</option>
                            <option value="Ujang Suhara, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Ujang Suhara, S.Pd' ? 'selected' : '' }}>Ujang Suhara, S.Pd</option>
                            <option value="Uli Solihat Kamaluddin, S.Si, Gr" {{ old('guru_dituju', $ortu->guru_dituju) == 'Uli Solihat Kamaluddin, S.Si, Gr' ? 'selected' : '' }}>Uli Solihat Kamaluddin, S.Si, Gr</option>
                            <option value="Wanto Kurniawan" {{ old('guru_dituju', $ortu->guru_dituju) == 'Wanto Kurniawan' ? 'selected' : '' }}>Wanto Kurniawan</option>
                            <option value="Windy Novia Anggraeni, S.Si" {{ old('guru_dituju', $ortu->guru_dituju) == 'Windy Novia Anggraeni, S.Si' ? 'selected' : '' }}>Windy Novia Anggraeni, S.Si</option>
                            <option value="Yeni Meilina, S.Pd" {{ old('guru_dituju', $ortu->guru_dituju) == 'Yeni Meilina, S.Pd' ? 'selected' : '' }}>Yeni Meilina, S.Pd</option>
                            <option value="Zaka Faishal Hadiyan S, Kom" {{ old('guru_dituju', $ortu->guru_dituju) == 'Zaka Faishal Hadiyan S, Kom' ? 'selected' : '' }}>Zaka Faishal Hadiyan S, Kom</option>
                        </select>
                    </div>

                    <!-- Keperluan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Keperluan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="keperluan" 
                                  rows="3"
                                  placeholder="Jelaskan keperluan kunjungan Anda"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                  required>{{ old('keperluan', $ortu->keperluan) }}</textarea>
                    </div>

                    
                    <!-- Waktu Kunjungan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Waktu Kunjungan <span class="text-red-500">*</span>
                        </label>
                        <input type="time" 
                               name="waktu_kunjungan" 
                               value="{{ old('waktu_kunjungan', $ortu->waktu_kunjungan) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               required>
                    </div>

                    <!-- Tanggal Kunjungan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Kunjungan <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               name="tanggal" 
                               value="{{ old('tanggal', $ortu->tanggal) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               required>
                    </div>

                    <!-- Foto -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Foto
                        </label>
                        
                        @if($ortu->foto)
                        <!-- Existing Photo -->
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $ortu->foto) }}" alt="Foto saat ini" class="w-24 h-24 object-cover rounded-lg border border-gray-300">
                                <div class="absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                    ✓
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center justify-center w-full">
                            <label for="foto" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">{{ $ortu->foto ? 'Klik untuk mengganti foto' : 'Klik untuk upload' }}</span> atau drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 2MB)</p>
                                </div>
                                <input id="foto" type="file" name="foto" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <div id="preview-container" class="mt-4 hidden">
                            <p class="text-sm text-gray-600 mb-2">Foto baru:</p>
                            <div class="relative inline-block">
                                <img id="image-preview" src="" alt="Preview" class="w-24 h-24 object-cover rounded-lg border border-gray-300">
                                <button type="button" id="remove-image" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('ortu.index') }}" 
                       class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 font-medium">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
            document.getElementById('preview-container').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('remove-image').addEventListener('click', function() {
    document.getElementById('foto').value = '';
    document.getElementById('preview-container').classList.add('hidden');
});
</script>
@endsection