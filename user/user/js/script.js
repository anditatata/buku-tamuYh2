document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.querySelector('#tanggal');
      const timeInput = document.querySelector('#waktu');
      
      const today = new Date();
      const currentDate = today.toISOString().split('T')[0];
      const currentTime = today.getHours().toString().padStart(2, '0') + ':' + 
                         today.getMinutes().toString().padStart(2, '0');
      
      dateInput.value = currentDate;
      timeInput.value = currentTime;
    });



    // Camera functionality
    let cameraStream = null;
    let cameraStarted = false;

    const camera = document.getElementById('camera');
    const canvas = document.getElementById('canvas');
    const photoPreview = document.getElementById('photo-preview');
    const startCameraBtn = document.getElementById('start-camera');
    const takePhotoBtn = document.getElementById('take-photo');
    const retakePhotoBtn = document.getElementById('retake-photo');
    const stopCameraBtn = document.getElementById('stop-camera');
    const fotoDataInput = document.getElementById('foto_data');
    const cameraWarning = document.getElementById('camera-warning');

    // Start camera function
    async function startCamera() {
      try {
        // Show warning initially
        cameraWarning.style.display = 'block';
        
        // Request camera access
        cameraStream = await navigator.mediaDevices.getUserMedia({
          video: {
            width: { ideal: 640 },
            height: { ideal: 480 },
            facingMode: 'user', // Front camera for selfie,
            
          }
        });
        
        // Hide warning on success
        cameraWarning.style.display = 'none';
        
        camera.srcObject = cameraStream;
        camera.style.display = 'block';
        camera.style.transform = 'scaleX(-1)'; // Tambahkan agar video tidak mirror
        
        // Update button visibility
        startCameraBtn.style.display = 'none';
        takePhotoBtn.style.display = 'inline-flex';
        stopCameraBtn.style.display = 'inline-flex';
        
        // Hide placeholder
        photoPreview.querySelector('.camera-placeholder').style.display = 'none';
        
        cameraStarted = true;
        
      } catch (error) {
        console.error('Error accessing camera:', error);
        
        // Show detailed error message
        let errorMessage = 'Tidak dapat mengakses kamera. ';
        
        if (error.name === 'NotAllowedError') {
          errorMessage += 'Silakan izinkan akses kamera di browser Anda.';
        } else if (error.name === 'NotFoundError') {
          errorMessage += 'Kamera tidak ditemukan pada perangkat ini.';
        } else if (error.name === 'NotSupportedError') {
          errorMessage += 'Browser tidak mendukung akses kamera.';
        } else {
          errorMessage += 'Terjadi kesalahan: ' + error.message;
        }
        
        cameraWarning.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${errorMessage}`;
        cameraWarning.style.display = 'block';
      }
    }

    // Take photo function
    function takePhoto() {
      if (!cameraStarted || !cameraStream) {
        alert('Kamera belum dimulai!');
        return;
      }
      
      // Set canvas dimensions to match video
      canvas.width = camera.videoWidth;
      canvas.height = camera.videoHeight;
      
      // Draw the video frame to canvas (flip horizontally agar hasil tidak mirror)
      const ctx = canvas.getContext('2d');
      ctx.setTransform(-1, 0, 0, 1, canvas.width, 0); // Flip horizontal
      ctx.drawImage(camera, 0, 0, canvas.width, canvas.height);
      ctx.setTransform(1, 0, 0, 1, 0, 0); // Reset transform
      
      // Convert to data URL
      const dataURL = canvas.toDataURL('image/jpeg', 0.8);
      
      // Create image element and display
      const img = document.createElement('img');
      img.src = dataURL;
      img.alt = 'Foto Pengunjung';
      
      // Clear preview and add image
      photoPreview.innerHTML = '';
      photoPreview.appendChild(img);
      
      // Store image data
      fotoDataInput.value = dataURL;
      
      // Stop camera and update buttons
      stopCamera();
      retakePhotoBtn.style.display = 'inline-flex';
    }

    // Retake photo function
    function retakePhoto() {
      // Clear previous photo
      photoPreview.innerHTML = '<div class="camera-placeholder"><i class="fas fa-user-circle"></i><p>Klik tombol kamera untuk mengambil foto</p></div>';
      fotoDataInput.value = '';
      
      // Hide retake button and show start camera button
      retakePhotoBtn.style.display = 'none';
      startCameraBtn.style.display = 'inline-flex';
    }

    // Stop camera function
    function stopCamera() {
      if (cameraStream) {
        cameraStream.getTracks().forEach(track => track.stop());
        cameraStream = null;
      }
      
      camera.style.display = 'none';
      camera.srcObject = null;
      camera.style.transform = 'none'; // Reset transform
      
      // Update button visibility
      startCameraBtn.style.display = 'inline-flex';
      takePhotoBtn.style.display = 'none';
      stopCameraBtn.style.display = 'none';
      
      cameraStarted = false;
    }

    // Event listeners for camera buttons
    startCameraBtn.addEventListener('click', startCamera);
    takePhotoBtn.addEventListener('click', takePhoto);
    retakePhotoBtn.addEventListener('click', retakePhoto);
    stopCameraBtn.addEventListener('click', stopCamera);

    // Form validation and submission
    const form = document.getElementById('instansiForm');
    const inputs = form.querySelectorAll('input, select, textarea');

    // Add input validation effects
    inputs.forEach(input => {
      input.addEventListener('blur', function() {
        if (this.hasAttribute('required') && !this.value.trim()) {
          this.classList.add('input-error');
          this.classList.remove('input-success');
        } else if (this.value.trim()) {
          this.classList.add('input-success');
          this.classList.remove('input-error');
        }
      });

      input.addEventListener('focus', function() {
        this.classList.remove('input-error', 'input-success');
      });
    });

    // Phone number formatting
    const kontakInput = document.getElementById('kontak');
    kontakInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 0) {
        if (value.startsWith('0')) {
          value = '0' + value.slice(1).replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
        } else if (value.startsWith('62')) {
          value = '+62' + value.slice(2).replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
        }
      }
      e.target.value = value;
    });

    // Set minimum date to today
    const tanggalInput = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[0];
    tanggalInput.min = today;

    // Form submission handler
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Check required fields
      let isValid = true;
      const requiredFields = form.querySelectorAll('[required]');
      
      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          field.classList.add('input-error');
          isValid = false;
        }
      });

      if (!isValid) {
        alert('Mohon lengkapi semua field yang wajib diisi!');
        return;
      }

      // Show loading state
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim Data...';
      submitBtn.disabled = true;

      // Simulate form submission (replace with actual submission)
      setTimeout(() => {
        alert('Data kunjungan berhasil dikirim! Terima kasih atas kunjungan Anda.');
        
        // Reset form
        form.reset();
        
        // Clear photo
        if (fotoDataInput.value) {
          retakePhoto();
        }
        
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Remove validation classes
        inputs.forEach(input => {
          input.classList.remove('input-success', 'input-error');
        });
        
      }, 2000);
    });

    // Auto-resize textarea
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
      textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
      });
    });

    // Smooth scroll for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });

    // Clean up camera stream when page unloads
    window.addEventListener('beforeunload', function() {
      if (cameraStream) {
        cameraStream.getTracks().forEach(track => track.stop());
      }
    });

    // Initialize form animations on page load
    window.addEventListener('load', function() {
      const formGroups = document.querySelectorAll('.form-group');
      formGroups.forEach((group, index) => {
        setTimeout(() => {
          group.style.opacity = '1';
          group.style.transform = 'translateX(0)';
        }, index * 100);
      });
    });