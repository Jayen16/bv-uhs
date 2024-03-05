<script setup>
import PerfectScrollbar from '@/Components/PerfectScrollbar.vue'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon ,AccountIcon , DirectoryIcon , AppointmentIcon, ReportIcon, VisitorIcon, PatientsIcon} from '@/Components/Icons/outline'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import { TemplateIcon } from '@heroicons/vue/outline'


// import { ref } from 'vue'
// import axios from 'axios'

// const username = ref('')
// const password = ref('')

// const login = async () => {
//   try {
//     const response = await axios.get(`/api/user/${$page.props.auth.user.type_id}`)

//     // Upon successful login, extract user role from response
//     const { role } = response.data.user

//     // Store user role in session storage
//     sessionStorage.setItem('userRole', role)

//     // Redirect to dashboard or another page
//     // router.push('/dashboard')
//   } catch (error) {
//     console.error('Login failed:', error)
//   }
// }

</script>

<template>
    <PerfectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarCollapsible
            v-if="$page.props.auth.user.type_id === '1'"
            title="Management"
            :active="route().current('management.*')"
        >
            <template #icon>
                <AccountIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('management.user')" 
                title="User Account"
                :active="route().current('management.user')" 
            />

            <SidebarCollapsibleItem
                :href="route('management.staff')" 
                title="Staff Record"
                :active="route().current('management.staff')" 
            />
        </SidebarCollapsible>


        <SidebarLink
            v-if="$page.props.auth.user.type_id === '1'"
            title="Schedule"
            :href="route('schedule')"
            :active="route().current('schedule')"
        >
            <template #icon>
                <AppointmentIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <!-- <SidebarLink 
            v-if="$page.props.auth.user.type_id === '1'"
            title="Directory Record"
            :href="route('directory')"
            :active="route().current('directory')"
        >
            <template #icon>
                <DirectoryIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink> -->

        <SidebarCollapsible
            v-if="$page.props.auth.user.type_id === '1'"
            title="Directory Record"
            :active="route().current('directory.*')"
        >
            <template #icon>
                <AccountIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('directory.student_app')" 
                title="Student Applicant"
                :active="route().current('directory.student_app')" 
            />

            <SidebarCollapsibleItem
                :href="route('directory.enrolled_student')" 
                title="Enrolled Student"
                :active="route().current('directory.enrolled_student')" 
            />

            <SidebarCollapsibleItem
                :href="route('directory.employee')" 
                title="Employee"
                :active="route().current('directory.employee')" 
            />
        </SidebarCollapsible>



        <SidebarLink
            v-if="$page.props.auth.user.type_id === '1'"
            title="Reports"
            :href="route('report')"
            :active="route().current('report')"
        >
            <template #icon>
                <ReportIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>


        <!-- NURSE HERE -->


        <SidebarCollapsible
            v-if="$page.props.auth.user.type_id === '2'"
            title="Patient Record"
            :active="route().current('patient.*')"
        >
            <template #icon>
                <PatientsIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('patient.student')" 
                title="Student"
                :active="route().current('patient.student')" 
            />

            <SidebarCollapsibleItem
                :href="route('patient.employee')" 
                title="Employee"
                :active="route().current('patient.employee')" 
            />

            <SidebarCollapsibleItem
                :href="route('patient.outpatient')" 
                title="Outpatient"
                :active="route().current('patient.outpatient')" 
            />
        </SidebarCollapsible>


        <SidebarLink
            v-if="$page.props.auth.user.type_id === '2'"
            title="Visit List"
            :href="route('report')"
            :active="route().current('report')"
        >
            <template #icon>
                <VisitorIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarLink
            v-if="$page.props.auth.user.type_id === '2'"
            title="Release Result"
            :href="route('report')"
            :active="route().current('report')"
        >
            <template #icon>
                <ReportIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>



<!-- 
        <SidebarLink 
            v-if="$page.props.auth.user.type_id === '1'"
            title="Account"
            :href="route('account')"
            :active="route().current('account')"
        >
            <template #icon>
                <AccountIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink> -->

        <!-- <SidebarLink 
            v-if="$page.props.auth.user.type_id === '1'"
            title="Directory Record"
            :href="route('directory')"
            :active="route().current('directory')"
        >
            <template #icon>
                <DirectoryIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink> -->


        <!-- Examples -->
        
        <!-- => External link example
        <SidebarLink
            title="Github"
            href="https://github.com/kamona-wd/kui-laravel-breeze"
            external
            target="_blank"
        >
        </SidebarLink>

        => Collapsible examples
        <SidebarCollapsible title="Users" :active="$page.url.startsWith('/users')">
            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="$page.url === '/users/index'" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="$page.url === '/users/create'" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Users" :active="usePage().url.value.startsWith('/users')">
            <template #icon>
                <UserIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="route().current('users.index')" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="route().current('users.create')" />
        </SidebarCollapsible> -->
    </PerfectScrollbar>
</template>
