<template>
  <div id="modal-app" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <!-- Avatar forms -->
      <avatar-form
        v-if="formCategory == 'avatar'"
        :form="form"
        :action="formAction"
      ></avatar-form>
    </div>
  </div>
</template>

<script>
import AvatarForm from "../Avatar/AvatarForm";
import { bus } from "../../app";

export default {
  components: { AvatarForm },

  props: {},

  data: () => ({
    form: Object,
    formAction: String,
    formCategory: String,
  }),

  created() {
    this.active = false;
    bus.$on("OpenAvatarForm", (action) => {
      this.openForm(action);
    });

    bus.$on("closeModal", (action) => {
      this.closeModal(action);
    });
  },

  methods: {
    openForm(data) {
      this.formAction = data.action;
      this.form = Object.assign({}, data.form);
      this.form.user_id = parseInt(CurrentUserId);
      this.formCategory = data.category;
      this.openModal();
    },

    openModal() {
      UIkit.modal($("#modal-app")).show();
    },

    closeModal() {
      UIkit.modal($("#modal-app")).hide();
      this.formAction = "";
      this.form = {};
      this.formCategory = "";
    },
  },
};
</script>