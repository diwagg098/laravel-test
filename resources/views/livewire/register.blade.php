<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center">Register</h1>
        <form wire:submit.prevent="register">
          <div class="form-group">
            <label for="name">Fullname</label>
            <input type="text" id="name" class="form-control" wire:model="name" required placeholder="Full Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" wire:model="email" required class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" wire:model="password" placeholder="Enter your password">
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="passwordConfirmation" wire:model="passwordConfirmation" required class="form-control" placeholder="Re-type Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
  </div>