<!-- Footer-->
<footer class="py-1 footer bg-blue" id="tempaltemo_footer">
<div class="container">
    <div class="row">
        <div class="col-md-3 pt-1">
            <h2 class="h2 text-success border-bottom pb-3 border-black logo">สำนักงบประมาณ</h2>
            <ul class="list-unstyled text-light footer-link-list">
                <li>
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    ถนนพระรามที่ 6 แขวงพญาไท เขตพญาไท กรุงเทพฯ 10400
                </li>
                <li>
                    <i class="fa fa-phone fa-fw"></i>
                    <a class="text-decoration-none" href="tel:010-020-0340"> 0 2265 1000</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 pt-1">
            <!-- <h2 class="h2 text-light border-bottom pb-3 border-light">เมนู</h2> -->
            <ul class="list-unstyled text-light footer-link-list">
                <li><a class="text-footer {{ Nav::isRoute('home') }}"
                        href="{{ route('home') }}">Home</a></li>
            </ul>
        </div>

        <div class="col-md-3 pt-1">
            <ul class="list-unstyled text-light footer-link-list">
                <li>
                </li>
            </ul>
        </div>
        <div class="col-md-3 pt-1">
            <div class="text-center">

            </div>
        </div>
    </div>
</div>

</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('js/jquery-ui/jquery-ui.js') }}"></script>

