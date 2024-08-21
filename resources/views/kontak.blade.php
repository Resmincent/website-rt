 @extends('layouts.fitur')
 @section('landing')
 <!-- Jumbotron -->
 <div class="jumbotron1 jumbotron-fluid">
     <div class="container">
         <h1 class="display-4">KONTAK KAMI</h1>
     </div>
 </div>
 <!-- Akhir Jumbotron -->

 <!-- Footer -->
 <footer>
     <div class="main-content">
         <div class="left box">
             <h2>Tentang Kami</h2>
             <div class="content">
                 <p>Desa Bojong Kulur adalah sebuah RT yang berada di Jl.Saluyu-3, Kec.Gunung Putri, Kab.bogor, Jawa Barat</p>
                 <div class="social">
                     <a href="#" style="color: white;"><span class="fab fa-facebook-f"></span></a>
                     <a href="#" style="color: white;"><span class="fab fa-whatsapp"></span></a>
                     <a href="#" style="color: white;"><span class="fab fa-instagram"></span></a>
                     <a href="#" style="color: white;"><span class="fab fa-youtube"></span></a>
                 </div>
             </div>
         </div>
         <div class="center box">
             <h2>Alamat</h2>
             <div class="content">
                 <div class="place">
                     <span class="fas fa-map-marker-alt"></span>
                     <span class="text">RT03</span>
                 </div>
                 <div class="phone">
                     <span class="fas fa-phone-alt"></span>
                     <span class="text">+089-765432100</span>
                 </div>
                 <div class="email">
                     <span class="fas fa-envelope"></span>
                     <span class="text">rt0301@gmail.com</span>
                 </div>
             </div>
         </div>
         <div class="right box">
             <h2>Kontak Kami</h2>
             @if(Session::has('status'))
             <div class="alert alert-success">{{ Session::get('status') }}</div>
             @endif
             <div class="content">
                 <form action="" method="POST">
                     <form action="{{ route('contact.submit') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label for="name" class="form-label">Name</label>
                             <input type="text" class="form-control" id="name" name="name" required>
                         </div>
                         <div class="mb-3">
                             <label for="email" class="form-label">Email</label>
                             <input type="email" class="form-control" id="email" name="email" required>
                         </div>
                         <div class="mb-3">
                             <label for="message" class="form-label">Message</label>
                             <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary">Send</button>
                     </form>
                     <div class="bottom" style="text-align: center;">
                         <span class="far fa-copyright"></span> 2024 All rights reserved.
                     </div>
             </div>
         </div>
     </div>
 </footer>
 @endsection
