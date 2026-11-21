import { Link } from "@inertiajs/react";
import {
    CreditCard,
    FileUser,
    LayoutGrid,
    Pill,
    SquareUserRound,
    UserCog,
    Users,
    UserSearch,
    WalletCards,
    Workflow,
} from "lucide-react";
import AppLogo from "@/components/app-logo";
import { NavMain } from "@/components/nav-main";
import { NavUser } from "@/components/nav-user";
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";
import { dashboard } from "@/routes";
import type { NavItem } from "@/types";

const mainNavItems: NavItem[] = [
    {
        title: "Dashboard",
        href: dashboard(),
        icon: LayoutGrid,
    },
];

const masterDataNavItems: NavItem[] = [
    {
        title: "Faskes Profile",
        href: "/faskes-profiles",
        icon: LayoutGrid,
    },
    {
        title: "Role & Permission",
        href: "/role-permissions",
        icon: UserCog,
    },
    {
        title: "User",
        href: "/users",
        icon: Users,
    },
    {
        title: "Employee Position",
        href: "/employee-positions",
        icon: FileUser,
    },
    {
        title: "Employee",
        href: "/employees",
        icon: SquareUserRound,
    },
    {
        title: "Patient Category",
        href: "/patien-categories",
        icon: UserSearch,
    },
    {
        title: "Poly",
        href: "/polies",
        icon: Workflow,
    },
    {
        title: "Payer",
        href: "/payers",
        icon: CreditCard,
    },
    {
        title: "Payment Method",
        href: "/payment-method",
        icon: WalletCards,
    },
    {
        title: "Medicine",
        href: "/medicines",
        icon: Pill,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} header="Platform" />
                <NavMain items={masterDataNavItems} header="Master Data" />
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
