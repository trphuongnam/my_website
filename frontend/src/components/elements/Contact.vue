<template>
  <div id="contact">
    <section id="contact_item">
      <div class="title-element title_left"><h3>QUICK INFO</h3></div>
      <dl class="info_contact">
        <dt class="name_info">Fullname</dt>
        <dd class="content_info">TRAN PHUONG NAM</dd><br>
        <dt class="name_info">Telephone</dt>
        <dd class="content_info">035 815 0744</dd><br>
        <dt class="name_info">Email</dt>
        <dd class="content_info">phuongnamgroupers@gmail.com</dd><br>
        <dt class="name_info">Site</dt>
        <dd class="content_info">phuongnam.com</dd><br>
        <dt class="name_info">Address</dt>
        <dd class="content_info">K104/06 Doan Phu Tu - Hoa Khanh Bac - Lien Chieu - Da Nang</dd>
      </dl>
    </section>
    <section id="contact_form">
      <div class="title-element title_right"><h3>CONTACT ME</h3></div>
      <form action="#" class="ct_form">
        <div class="input_form">
          <input
            type="text"
            name="fullname"
            class="text_input"
            id="fname"
            placeholder="Full Name"
            tabindex="1"
            required
          />
          <input
            type="tel"
            name="telephone"
            class="text_input"
            id="telephone"
            placeholder="Telephone"
            tabindex="2"
            required
          />
          <input
            type="text"
            name="email"
            id="email"
            class="text_input"
            placeholder="Email"
            tabindex="3"
            required
          />
          <textarea
            name="content"
            id="content"
            cols="30"
            rows="10"
            class="text_input"
            placeholder="Write your message here ..."
            tabindex="4"
            required
          ></textarea>
          <button class="btn-primary button_send">SEND</button>
        </div>
      </form>
    </section>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
#contact {
  grid-row: 5/6;
  grid-column: 1/4;
  border: 0px solid #fff;
  display: flex;
}

#contact_item {
  width: 50%;
  height: 500px;
  background-color: #2e4975;
  padding: 20px;
  text-align: left;
}

.info_contact {
  color: #fff;
  height: 50px;
}

.name_info{
  width: 100px;
  text-align: left;
  display: inline-block;
}

.content_info{
  text-align: left;
  display: inline-block;
}

.title_left {
  color: #fff;
  margin-bottom: 50px;
}

.table_info {
  border-collapse: unset;
}

.title_right {
  color: #000;
  margin-bottom: 50px;
}

#contact_form {
  width: 50%;
  height: 500px;
  background-color: #bbc8dd;
  padding: 20px;
}

.text_input {
  border: none;
  border-bottom: 1px solid #2e4975;
  height: 50px;
  margin-bottom: 10px;
  background: none;
}

.input_form {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: repeat(4, 1fr);
}

#fname {
  grid-column: 1/2;
  grid-row: 1/2;
}

#telephone {
  grid-column: 2/3;
  grid-row: 1/2;
}

#email {
  grid-column: 1/3;
  grid-row: 2/3;
}

#content {
  grid-column: 1/3;
  grid-row: 3/4;
}

.button_send {
  grid-column: 1/3;
  grid-row: 4/5;
}

@media screen and (max-width: 1024px) {
  .input_form {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(5, 1fr);
  }
  #fname {
    grid-column: 1/3;
    grid-row: 1/2;
  }

  #telephone {
    grid-column: 1/3;
    grid-row: 2/3;
  }

  #email {
    grid-column: 1/3;
    grid-row: 3/4;
  }

  #content {
    grid-column: 1/3;
    grid-row: 4/5;
  }

  .button_send {
    grid-column: 1/3;
    grid-row: 5/6;
  }
}

@media screen and (max-width: 768px) {
  #contact{
    flex-direction: column;
  }

  #contact_item{
    width: 100%;
  }

  #contact_form{
    width: 100%
  }
}
</style>