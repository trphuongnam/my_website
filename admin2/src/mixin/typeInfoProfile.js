export const typeInfoProfile = {
  data() {
    return {
      typeInfoProfile: [
        'Select Category',
        { label: 'Abouts', value: 'abouts' },
        { label: 'Experients', value: 'experients' },
        { label: 'Educations', value: 'educations', selected: true },
      ],
      status: [
        'Select Status',
        { label: 'Enable', value: '1' },
        { label: 'Disable', value: '0' },
      ],
    }
  },
}
