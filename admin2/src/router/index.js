import { createRouter, createWebHashHistory } from 'vue-router'

// Import component website manage
import WebsiteInfo from '@/views/WebsiteInfo/Index'
import ListWebsiteInfo from '@/views/WebsiteInfo/ListWebsiteInfo'
import AddWebsiteInfo from '@/views/WebsiteInfo/AddWebsiteInfo'
import EditWebsiteInfo from '@/views/WebsiteInfo/EditWebsiteInfo'

// Import component profile information
import ProfileInformation from '@/views/profile_info/Index'
import ListProfileInformation from '@/views/profile_info/List'
import AddProfileInformation from '@/views/profile_info/Add'
import EditProfileInformation from '@/views/profile_info/Edit'

// Import component skills
import Skill from '@/views/skills/Index'
import ListSkill from '@/views/skills/List'
import AddSkill from '@/views/skills/Add'
import EditSkill from '@/views/skills/Edit'

// Import component contact
import Contact from '@/views/contacts/Index'
import ListContact from '@/views/contacts/List'
import AddContact from '@/views/contacts/Add'
import EditContact from '@/views/contacts/Edit'

import DefaultLayout from '@/layouts/DefaultLayout'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: DefaultLayout,
    redirect: '/dashboard',
    children: [
      {
        path: '/dashboard',
        name: 'Dashboard',
        component: () =>
          import(/* webpackChunkName: "dashboard" */ '@/views/Dashboard.vue'),
      },
      {
        path: '/website-manage',
        name: 'WebsiteInfo',
        component: WebsiteInfo,
        redirect: '/website-manage/index',
        children: [
          {
            path: '/website-manage/index',
            name: 'ListWebsite',
            component: ListWebsiteInfo,
          },
          {
            path: '/website-manage/add',
            name: 'CreateWebsite',
            component: AddWebsiteInfo,
          },
          {
            path: '/website-manage/edit/:idInfo',
            name: 'EditWebsite',
            component: EditWebsiteInfo,
          },
        ],
      },
      {
        path: '/information-manage',
        name: 'ProfileInformation',
        component: ProfileInformation,
        redirect: '/information-manage/index',
        children: [
          {
            path: '/information-manage/index',
            name: 'ListProfile',
            component: ListProfileInformation,
          },
          {
            path: '/information-manage/add',
            name: 'CreateProfile',
            component: AddProfileInformation,
          },
          {
            path: '/information-manage/edit/:idInfo',
            name: 'EditProfile',
            component: EditProfileInformation,
          },
        ],
      },
      {
        path: '/skill-manage',
        name: 'Skill',
        component: Skill,
        redirect: '/skill-manage/index',
        children: [
          {
            path: '/skill-manage/index',
            name: 'ListSkill',
            component: ListSkill,
          },
          {
            path: '/skill-manage/add',
            name: 'CreateSkill',
            component: AddSkill,
          },
          {
            path: '/skill-manage/edit/:idSkill',
            name: 'EditSkill',
            component: EditSkill,
          },
        ],
      },
      {
        path: '/contact-manage',
        name: 'Contact',
        component: Contact,
        redirect: '/contact-manage/index',
        children: [
          {
            path: '/contact-manage/index',
            name: 'ListContact',
            component: ListContact,
          },
          {
            path: '/contact-manage/add',
            name: 'CreateContact',
            component: AddContact,
          },
          {
            path: '/contact-manage/edit/:idContact',
            name: 'EditContact',
            component: EditContact,
          },
        ],
      },
    ],
  },
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes,
  scrollBehavior() {
    // always scroll to top
    return { top: 0 }
  },
})

export default router
