<script src="{{ URL::asset('Shreyu/assets/js/vendor.min.js') }}"></script>
@yield('script')
<script src="{{ URL::asset('Shreyu/assets/js/app.min.js') }}"></script>

<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

{{-- 
<script src="{{ URL::asset('js/jquery/dist/jquery.js') }}"></script> --}}

<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
 

 {{-- cdn del vue.js --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}


@yield('script-bottom')