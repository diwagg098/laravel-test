<div class="container">
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center">Login</h1>
        <form wire:submit.prevent="login">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="email" wire:model="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" wire:model="password" id="password">
          </div>
          <a href="/register">Need Register ?</a>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
  </div>
</div>