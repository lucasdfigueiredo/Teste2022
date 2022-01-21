<style type="text/css">
    * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  margin-top: 5px;
  margin-bottom: 5px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div class="container">
  <form action="../command/cadContato.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">Nome Completo</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtNome" placeholder="Seu Nome..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">E-mail</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtEmail" placeholder="Seu e-mail..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="endereco">Endereço</label>
      </div>
      <div class="col-75">
        <select id="endereco" name="txtCidade">
          <option value="Sorocaba">Sorocaba</option>
          <option value="Itu">Itu</option>
          <option value="Votorantim">Votorantim</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Contato</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="txtMsg" placeholder="Sobre oque voce quer falar..." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Enviar">
    </div>
  </form>
</div>