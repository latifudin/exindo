<script src="{{ asset('template/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('template/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('template/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('template/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('template/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('template/js/main.js') }}"></script>

<script>
    //message with toastr
    @if(session() -> has('success'))
    toastr.success('{{ session('success ') }}', 'BERHASIL!');
    @elseif(session() -> has('error'))
    toastr.error('{{ session('error ') }}', 'GAGAL!');
    @endif
</script>

@yield('js')