import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Link } from '@inertiajs/react';

export default function Dashboard({ user_type }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />
           
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            {user_type == 'admin' ? (
                                <p>Welcome, Admin! You have administrative access.</p>
                            ) : user_type == 'user' ? (
                                <p>Welcome, User! You have standard access.</p>
                            ) : (
                                <p>Welcome! Your access level is undefined.</p>
                            )}

                            {/* Render buttons based on user_type */}
                            {user_type == 'admin' && (
                                <button className="btn btn-primary">
                                     <Link href={route("bookings.index")}>
                                    <i className="icon-user-tie" />
                                    <span>Flight Booking</span>
                                </Link>
                                </button>
                            )}
                            {user_type == 'user' && (
                                <button className="btn btn-secondary">
                                    <Link href={route("bookings.userBookingList")}>
                                    <i className="icon-user-tie" />
                                    <span>All Flight Bookings</span>
                                </Link>
                                </button>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
