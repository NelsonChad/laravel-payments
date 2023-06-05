<template>
    <div>
        <div class="d-flex justify-content-center">
        <h3 class="title">{{ methodname }}</h3>
      </div>
      <div class="card">
        <div class="card-body">
          <h6>Instruções:</h6>
          <ol type="1">
            <li><small>Tenha o seu celular com o M-Pesa na mão</small></li>
            <li>
                <small>
                    Digite e seu número de celular e montante que pretende
                    transferir e insira o seu PIN do M-Pesa no seu celular
                </small>
            </li>
          </ol>
        </div>
      </div>
      <div class="d-flex flex-wrap justify-content-center">
        <form style="width: 300px">
          <br />
          <label for="phone_number">Número de Celular</label>
          <div class="input-group mb-3">
            <span class="input-group-text success">
              <i class="fas fa-mobile-alt"></i>
            </span>
            <input
              type="tel"
              class="form-control"
              id="phone_number"
              aria-describedby="numberHelp"
              placeholder="Digite o número"
              name="phone_number"
              required
            />
          </div>

          <label for="amount">Montante</label>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-dollar-sign"></i>
            </span>
            <input
              type="number"
              class="form-control"
              name="amount"
              id="amount"
              required
              placeholder="digite o montante a transferir"
            />
          </div>
          <br />
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Transferir</button>
          </div>
        </form>
      </div>
    </div>
</template>
<script setup lang="ts">
  defineProps<{
    methodname: string;
  }>();
</script>
<script lang="ts">
    export default {};
</script>
