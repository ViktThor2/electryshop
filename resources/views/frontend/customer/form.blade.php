<div class="w-50" id="registerMain">

  <!--Registracion Form -->
  <form class="mt-2 mb-2" id="customerForm"
        method="post" action="{{ $customer->id
            ? route('customer.update', $customer->id)
            : route('customer.store') }}" >
      @csrf

      @if($customer->id)
      <h3>Profil</h3>

        <input type="hidden" name="_method"
                  value="PUT">{{--PATCH--}}
      @else
        <h4 class="modal-title mb-2">Regisztráció</h4>
      @endif

      <!-- Name input -->
      <div class="input-group mb-3">
        <span class="input-group-text">Név :</span>
          <input type="text" class="form-control"
            name="name" id="custmerName"
            value="{{old('name') ?: $customer->name }}"/>
      </div>

      <!-- Email input  -->
      <div class="input-group mb-3">
        <span class="input-group-text">Email cím :</span>
          <input type="email" class="form-control"
            name="email" id="customerEmail"
            value="{{old('email') ?: $customer->email }}"/>
      </div>

      <!-- Phone input  -->
      <div class="input-group mb-3">
        <span class="input-group-text">Telefonszám :</span>
        <input type="string" class="form-control"
          name="phone" id="phone"
          value="{{old('phone') ?: $customer->phone }}"/>
      </div>

      <!-- Password input  -->
      <div class="input-group mb-3">
        <span class="input-group-text">Jelszó :</span>
        <input type="password" class="form-control"
             name="password" id="customerPassword" />
      </div>

      <!-- Password input again -->
      <div class="input-group mb-3">
        <span class="input-group-text">Jelszó ismét :</span>
        <input type="password" class="form-control"
          id="customerConfirmation" name="password_confirmation"/>
      </div>

      <!--  Adress  -->

      <!-- Postal code And City input -->
      <div class="input-group mb-3">

        <!-- Postal code input -->
        <span class="input-group-text">Irányítószám :</span>
        <input type="number" class="form-control"
            name="postal" id="postal"
            value="{{old('postal') ?: $customer->postal}}" />

        <!-- City input  -->
        <span class="input-group-text">Város : </span>
        <input type="text" class="form-control"
            id="city" name="city"
            value="{{old('city') ?: $customer->city}}" />
      </div>

      <!-- Street And City House number -->
      <div class="input-group mb-3">

        <!-- Street input  -->
        <span class="input-group-text">Utca: </span>
        <input type="text" class="form-control"
          id="street" name="street"
          value="{{old('street') ?: $customer->street}}"/>

        <!-- house number input  -->
        <span class="input-group-text">Házszám : </span>
          <input type="string" class="form-control"
            id="house" name="house"
            value="{{old('house') ?: $customer->house}}"/>
      </div>

      <!-- Registracion button -->
      <button class="btn btn-primary btn-block" type="submit">
          @if($customer->id) Mentés
          @else Regisztráció
          @endif
       </button>

  </form>

</div>
