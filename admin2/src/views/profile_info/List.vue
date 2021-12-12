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
    <CTableBody>
      <CTableRow>
        <CTableHeaderCell scope="row">1</CTableHeaderCell>
        <CTableDataCell>About</CTableDataCell>
        <CTableDataCell>Noi dung gioi thieu</CTableDataCell>
        <CTableDataCell>Active</CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill margin_right_10"
            :to="{ name: 'EditProfile', params: { idInfo: 1 } }"
          >
            <CIcon :icon="cilPen" size="xs" /> Edit
          </router-link>
          <CButton color="danger" shape="rounded-pill">
            <CIcon :icon="cilDelete" size="xs" /> Delete
          </CButton>
        </CTableDataCell>
      </CTableRow>
      <CTableRow>
        <CTableHeaderCell scope="row">2</CTableHeaderCell>
        <CTableDataCell>Experients</CTableDataCell>
        <CTableDataCell>Kinh nghiem lam viec</CTableDataCell>
        <CTableDataCell>Active</CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill margin_right_10"
            :to="{ name: 'EditProfile', params: { idInfo: 1 } }"
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

export default {
  name: 'ListWebsiteInforView',
  setup() {
    return {
      cilPlus,
      cilPen,
      cilDelete,
    }
  },
}
</script>
<style scoped></style>
