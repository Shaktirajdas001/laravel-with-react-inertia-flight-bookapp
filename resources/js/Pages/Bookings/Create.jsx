import React from 'react';
import { useForm } from '@inertiajs/react';
import {
    Button,
    TextField,
    MenuItem,
    Typography,
    Grid,
    Container,
    Paper,
    Select,
    FormControl,
    InputLabel,
    FormHelperText,
} from '@mui/material';

export default function Create({ flightDays }) {
    const { data, setData, post, errors } = useForm({
        flight_name: '',
        take_of_location: '',
        landing_loaction: '',
        take_of_time: '',
        landing_time: '',
        landing_date: '',
        booking_day: '',
    });

    function handleSubmit(e) {
        e.preventDefault();
        post(route('bookings.store'));
    }

    return (
        <Container component="main" maxWidth="xs">
            <Paper elevation={3} style={{ padding: 20 }}>
                <Typography variant="h5" align="center" gutterBottom>
                    Create Booking
                </Typography>
                <form onSubmit={handleSubmit}>
                    <Grid container spacing={2}>
                        <Grid item xs={12}>
                            <TextField
                                fullWidth
                                label="Flight Name"
                                variant="outlined"
                                value={data.flight_name}
                                onChange={e => setData('flight_name', e.target.value)}
                                error={!!errors.flight_name}
                                helperText={errors.flight_name}
                            />
                        </Grid>
                        <Grid item xs={12}>
                            <TextField
                                fullWidth
                                label="Take Off Location"
                                variant="outlined"
                                value={data.take_of_location}
                                onChange={e => setData('take_of_location', e.target.value)}
                                error={!!errors.take_of_location}
                                helperText={errors.take_of_location}
                            />
                        </Grid>
                        <Grid item xs={12}>
                            <TextField
                                fullWidth
                                label="Landing Location"
                                variant="outlined"
                                value={data.landing_loaction}
                                onChange={e => setData('landing_loaction', e.target.value)}
                                error={!!errors.landing_loaction}
                                helperText={errors.landing_loaction}
                            />
                        </Grid>
                        <Grid item xs={6}>
                            <TextField
                                fullWidth
                                label="Start Time"
                                type="time"
                                variant="outlined"
                                value={data.take_of_time}
                                onChange={e => setData('take_of_time', e.target.value)}
                                error={!!errors.take_of_time}
                                helperText={errors.take_of_time}
                            />
                        </Grid>
                        <Grid item xs={6}>
                            <TextField
                                fullWidth
                                label="End Time"
                                type="time"
                                variant="outlined"
                                value={data.landing_time}
                                onChange={e => setData('landing_time', e.target.value)}
                                error={!!errors.landing_time}
                                helperText={errors.landing_time}
                            />
                        </Grid>
                        <Grid item xs={12}>
                            <TextField
                                fullWidth
                                label="Landing Date"
                                type="date"
                                variant="outlined"
                                InputLabelProps={{ shrink: true }}
                                value={data.landing_date}
                                onChange={e => setData('landing_date', e.target.value)}
                                error={!!errors.landing_date}
                                helperText={errors.landing_date}
                            />
                        </Grid>
                        <Grid item xs={12}>
                            <FormControl fullWidth variant="outlined" error={!!errors.booking_day}>
                                <InputLabel>Booking Day</InputLabel>
                                <Select
                                    value={data.booking_day}
                                    onChange={e => setData('booking_day', e.target.value)}
                                >
                                    <MenuItem value="">
                                        <em>Select Day</em>
                                    </MenuItem>
                                    {flightDays.map(day => (
                                        <MenuItem key={day.id} value={day.name}>
                                            {day.name}
                                        </MenuItem>
                                    ))}
                                </Select>
                                <FormHelperText>{errors.booking_day}</FormHelperText>
                            </FormControl>
                        </Grid>
                    </Grid>
                    <Button type="submit" fullWidth variant="contained" color="primary" style={{ marginTop: 20 }}>
                        Create
                    </Button>
                </form>
            </Paper>
        </Container>
    );
}
