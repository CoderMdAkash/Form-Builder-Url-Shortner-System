<div class="navbar-nav w-100">
    <a href="#" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

    @if(auth()->user()->role == 'admin')
        <a href="{{route('organization.index')}}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Organization</a>
        <a href="{{ route('categories.index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Category</a>
        <a href="{{route('form-templates.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Form Template</a>
        <a href="{{route('fields.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Field</a>
    @else
        <a href="{{route('forms.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Form Template</a>
    @endif
    <a href="{{route('all.submitted.data')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Submitted List</a>

</div>