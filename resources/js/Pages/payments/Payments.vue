<template>
  <div class="container">
    <div>
      <h3>Pagamentos</h3>
    </div>
    <br />
    <!-- START CONTENNT -->

    <div class="tab">
      <div style="padding: 10px; background-color: #fff">
        <b class="title">Carteiras Móveis</b>
      </div>
      <button
        class="tablinks"
        onclick="openCity(event, 'mpesa')"
        ref="defaultOpen"
        data-bs-toggle="tooltip"
        data-bs-placement="top"
      >
        <img class="image rounded" src="img/mpesa.png" />
        <label style="padding: 10px">M-Pesa</label>
      </button>
      <button class="tablinks" onclick="openCity(event, 'emola')">
        <img class="image rounded" src="img/emola.png" />
        <label style="padding: 10px">E-Mola</label>
      </button>
      <button class="tablinks" onclick="openCity(event, 'mkesh')">
        <img class="image rounded" src="img/mkesh.png" />
        <label style="padding: 10px">M-Cash</label>
      </button>
      <div style="padding: 10px; background-color: #fff">
        <b class="title">Outros Métodos</b>
      </div>
      <button class="tablinks" onclick="openCity(event, 'visa')">
        <img class="image rounded" src="img/visa.png" />
        <label style="padding: 10px">Visa</label>
      </button>
      <button class="tablinks" onclick="openCity(event, 'paypal')">
        <img class="image rounded" src="img/paypal.png" />
        <label style="padding: 10px">Paypal</label>
      </button>
    </div>

    <div id="mpesa" class="tabcontent">
        <div class="d-flex flex-wrap justify-content-center">
            <MobilePayments :methodname="'M-Pesa'"></MobilePayments>
        </div>
    </div>

    <div id="emola" class="tabcontent">
      <div class="d-flex flex-wrap justify-content-center">
        <MobilePayments :methodname="'E-Mola'"></MobilePayments>
      </div>
    </div>

    <div id="mkesh" class="tabcontent">
      <div class="d-flex flex-wrap justify-content-center">
        <MobilePayments :methodname="'M-Kesh'"></MobilePayments>
      </div>
    </div>
    <div id="visa" class="tabcontent">
      <h3>Visa</h3>
      <!-- Credit card form content -->
      <div class="d-flex flex-wrap justify-content-center">
        <div
          style="width: 600px; height: 340px; border: 1px solid #dfdfdf; border-radius: 5px; background-color: #f5f5f5;"
          class="d-flex flex-wrap justify-content-center"
        >
          <!-- credit card info-->
          <div style="width: 400px">
            <div id="credit-card" sty class="tab-pane fade show active pt-3">
              <form role="form" onsubmit="event.preventDefault()">
                <div class="form-group">
                  <label for="username">
                    <h6>Card Owner</h6>
                  </label>
                  <input
                    type="text"
                    name="username"
                    placeholder="Card Owner Name"
                    required
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label for="cardNumber">
                    <h6>Card number</h6>
                  </label>

                  <div class="input-group mb-3">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Valid card number"
                      aria-label="Recipient's username"
                      required
                    />
                    <span class="input-group-text" id="basic-addon2">
                      <i class="fab fa-cc-visa fa-lg"></i>
                      <i class="fab fa-cc-mastercard fa-lg"></i>
                      <i class="fab fa-cc-amex fa-lg"></i>
                    </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label
                        ><span class="hidden-xs">
                          <h6>Expiration Date</h6>
                        </span></label
                      >
                      <div class="input-group">
                        <input
                          type="number"
                          placeholder="MM"
                          name=""
                          class="form-control"
                          required
                        />
                        <input
                          type="number"
                          placeholder="YY"
                          name=""
                          class="form-control"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group mb-4">
                      <label
                        data-toggle="tooltip"
                        title="Three digit CV code on the back of your card"
                      >
                        <h6>
                          CVV <i class="fa fa-question-circle d-inline"></i>
                        </h6>
                      </label>
                      <input type="text" required class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button
                    type="button"
                    class="subscribe btn btn-primary btn-block shadow-sm"
                  >
                    Confirm Payment
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End -->
    </div>
    <div id="paypal" class="tabcontent">
      <h3>Paypal</h3>
      <p>Tokyo is the capital of Japan.</p>
    </div>
  </div>
</template>

<script setup lang="ts">
    import MobilePayments from "@/Components/payments/MobilePayments.vue";
</script>
<script lang="ts">
export default{
    methods: {},
    mounted (){
        this.$refs.defaultOpen.click()
    }
}
</script>