<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>PROFILES MANAGER</h2>
        <router-link
          class="btn btn-info rounded-pill"
          :to="{ name: 'CreateProfile' }"
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
        <CTableHeaderCell scope="col">Types</CTableHeaderCell>
        <CTableHeaderCell scope="col">Contents</CTableHeaderCell>
        <CTableHeaderCell scope="col">Status</CTableHeaderCell>
        <CTableHeaderCell scope="col">Functions</CTableHeaderCell>
      </CTableRow>
    </CTableHead>
    <CTableBody v-if="profiles != null">
      <CTableRow v-for="(profile, index) in profiles" :key="index">
        <CTableHeaderCell scope="row">{{ index + 1 }}</CTableHeaderCell>
        <CTableDataCell>{{ profile.name }}</CTableDataCell>
        <CTableDataCell v-html="profile.content"></CTableDataCell>
        <CTableDataCell>{{ statusProfile(profile.status) }}</CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill margin_right_10"
            :to="{ name: 'EditProfile', params: { idInfo: profile.id } }"
          >
            <CIcon :icon="cilPen" size="xs" /> Edit
          </router-link>
          <CButton color="danger" shape="rounded-pill">
            <CIcon :icon="cilDelete" size="xs" /> Delete
          </CButton>
        </CTableDataCell>
      </CTableRow>
    </CTableBody>
  </CTable>
  <router-view></router-view>
</template>
<script>
import { cilPlus, cilPen, cilDelete } from '@coreui/icons'
import axios from 'axios'
import { urlConfigMixin } from '@/mixin/urlConfigMixin'
import { profileMixin } from '@/mixin/profileMixin'

export default {
  name: 'ListWebsiteInforView',
  mixins: [urlConfigMixin, profileMixin],
  setup() {
    return {
      cilPlus,
      cilPen,
      cilDelete,
    }
  },
  async created() {
    this.getProfile()
  },
  data() {
    return {
      profiles: null,
    }
  },
  methods: {
    getProfile: async function () {
      try {
        var response = await axios.get(this.serverUrl + 'infomation')
        this.profiles = response.data
      } catch (error) {
        console.error(error)
      }
    },
  },
}
</script>
<style scoped></style>
