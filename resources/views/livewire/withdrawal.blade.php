<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
        <h1 class="text-light">Features</h1>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/deposit">Deposit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/withdrawal">Withdrawal</a>
        </li>
        </ul>
    </div>
    <div class="col-md-9 main-content">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <h1 class="text-center">Withdrawals</h1>
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form wire:submit.prevent="withdrawal">
                  <div class="form-group">
                    <label for="name">Withdrawal Amount</label>
                    <input type="number" id="amount" class="form-control" wire:model="amount" required placeholder="Withdrawal Amount">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Withdrawal</button>
                </form>
              </div>
            </div>
          </div>
    </div>
    </div>
</div>
