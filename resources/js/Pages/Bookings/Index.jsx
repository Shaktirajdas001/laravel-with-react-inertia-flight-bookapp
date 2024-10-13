import React from 'react';
import { Link, usePage, router } from '@inertiajs/react';
import { DataGrid } from '@mui/x-data-grid';
import { Button, IconButton } from '@mui/material';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';
import { Box } from '@mui/system';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
export default function Index() {
    const { bookings } = usePage().props;

    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this booking?')) {
            router.delete(route('bookings.destroy', id));
        }
    };

    // Define the columns for the DataGrid
    const columns = [
        { field: 'flight_name', headerName: 'Flight Name', width: 150 },
        { field: 'take_of_location', headerName: 'Take Off', width: 150 },
        { field: 'landing_loaction', headerName: 'Landing Location', width: 150 },
        { field: 'booking_day', headerName: 'Day', width: 100 },
        {
            field: 'actions',
            headerName: 'Actions',
            width: 150,
            renderCell: (params) => (
                <Box>
                    {/* Edit Button */}
                    <IconButton component={Link} href={route('bookings.edit', params.row.id)} color="primary">
                        <EditIcon />
                    </IconButton>

                    {/* Delete Button */}
                    <IconButton onClick={() => handleDelete(params.row.id)} color="error">
                        <DeleteIcon />
                    </IconButton>
                </Box>
            ),
        },
    ];

    // Map the booking data for the DataGrid
    const rows = bookings.map((booking) => ({
        id: booking.id,
        flight_name: booking.flight_name,
        take_of_location: booking.take_of_location,
        landing_loaction: booking.landing_loaction,
        booking_day: booking.booking_day,
    }));

    return (
        <AuthenticatedLayout
        header={
            <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard
            </h2>
        }
    >
        <div>
            <h1>Bookings List</h1>
            <Link href={route('bookings.create')} className="btn btn-primary">
                Create Booking
            </Link>

            <div style={{ height: 400, width: '100%', marginTop: '20px' }}>
                <DataGrid
                    rows={rows}
                    columns={columns}
                    pageSize={5}
                    rowsPerPageOptions={[5, 10, 20]}
                    checkboxSelection={false}
                    disableSelectionOnClick
                />
            </div>
        </div>
        </AuthenticatedLayout>
    );
   
}
