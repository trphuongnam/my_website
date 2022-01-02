export const urlConfigMixin = {
  created() {
    this.configUrl()
  },
  data() {
    return {
      serverUrl: '',
      serverUrlImage: '',
      serverUrlPDF: '',
    }
  },
  methods: {
    configUrl: function () {
      if (process.env.NODE_ENV === 'product') {
        this.serverUrl = process.env.VUE_APP_SERVER_URL_PRODUCT + 'api/'
        this.serverUrlImage =
          process.env.VUE_APP_SERVER_URL_PRODUCT + 'uploads/images/website/'
        this.serverUrlPDF =
          process.env.VUE_APP_SERVER_URL_PRODUCT + 'uploads/pdf_files/website/'
      } else {
        this.serverUrl = process.env.VUE_APP_SERVER_URL_DEV + 'api/'
        this.serverUrlImage =
          process.env.VUE_APP_SERVER_URL_DEV + 'uploads/images/website/'
        this.serverUrlPDF =
          process.env.VUE_APP_SERVER_URL_DEV + 'uploads/pdf_files/website/'
      }
    },
  },
}
