<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>WEBSITE INFORMATION MANAGER</h2>
        <router-link
          class="btn btn-info rounded-pill"
          :to="{ name: 'CreateWebsite' }"
        >
          <CIcon :icon="cilPlus" size="xs" /> Add
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CTable>
    <CTableHead>
      <CTableRow>
        <CTableHeaderCell scope="col">#</CTableHeaderCell>
        <CTableHeaderCell scope="col">Website Name</CTableHeaderCell>
        <CTableHeaderCell scope="col">Description</CTableHeaderCell>
        <CTableHeaderCell scope="col">Image</CTableHeaderCell>
        <CTableHeaderCell scope="col">Functions</CTableHeaderCell>
      </CTableRow>
    </CTableHead>
    <CTableBody>
      <CTableRow v-for="information in informations" :key="information.id">
        <CTableHeaderCell scope="row">{{ information.id }}</CTableHeaderCell>
        <CTableDataCell>{{ information.website_name }}</CTableDataCell>
        <CTableDataCell>{{ information.short_desc }}</CTableDataCell>
        <CTableDataCell>
          <CImage
            rounded
            thumbnail
            :src="urlFile + information.avatar"
            width="200"
            height="200"
          />
        </CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill"
            :to="{ name: 'EditWebsite', params: { idInfo: information.id } }"
          >
            <CIcon :icon="cilPen" size="xs" /> Edit
          </router-link>
        </CTableDataCell>
      </CTableRow>
    </CTableBody>
  </CTable>
  <router-view></router-view>
</template>
<script>
import { cilPlus, cilPen } from '@coreui/icons'
import axios from 'axios'
import { urlConfigMixin } from '@/mixin/urlConfigMixin.js'

export default {
  name: 'ListWebsiteInforView',
  mixins: [urlConfigMixin],
  setup() {
    return {
      cilPlus,
      cilPen,
    }
  },
  data() {
    return {
      informations: null,
      urlFile: '',
    }
  },
  async created() {
    try {
      console.log(this.serverUrl)
      var result = await axios.get(this.serverUrl + 'website_infomation')
      this.informations = result.data
      this.urlFile = this.serverUrlImage
    } catch (error) {
      console.log(error)
    }
  },
  methods: {},
}
</script>
<style scoped></style>
