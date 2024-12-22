<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <form action="{{ route('waste-reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    </form>
</div>
