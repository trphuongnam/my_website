export const profileMixin = {
  methods: {
    statusProfile: function (numStatus) {
      var strStatus = 'Enable'
      if (numStatus === 0) strStatus = 'Disable'
      return strStatus
    },
  },
}
