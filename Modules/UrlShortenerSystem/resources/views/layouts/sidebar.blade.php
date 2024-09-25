<div class="navbar-nav w-100">
    <a href="#" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

    @if(auth()->user()->role == 'admin')
        <a href="#" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Organization</a>
        <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Category</a>
        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Form Template</a>
        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Field</a>
        <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Submitted List</a>
    @else
        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Form Template</a>
    @endif

</div>