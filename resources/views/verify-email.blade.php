@if (session('message') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        A new email verification link has been emailed to you!
    </div>
@endif

<form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit">Request a new link</button>
</form>
