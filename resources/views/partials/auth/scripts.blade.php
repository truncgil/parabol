@stack('scripts_start')
    <!-- Core -->
    <script src="{{ asset('public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/js-cookie/js.cookie.js') }}"></script>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DX0Y59RNCN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DX0Y59RNCN');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6048101661713069"
     crossorigin="anonymous"></script>
    @stack('body_css')

    @stack('body_stylesheet')

    @stack('body_js')

    @stack('body_scripts')

    @livewireScripts
@stack('scripts_end')
