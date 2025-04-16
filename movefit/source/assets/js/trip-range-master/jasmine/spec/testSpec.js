"use strict";

describe('Trip range', function() {
    beforeEach(function(){
        jasmine.clock().install();
    });

    afterEach(function() {
        jasmine.clock().uninstall();
    });

    describe('start the date logic', function() {
        var fake_date = new Date('2017/10/10');

        beforeEach(function(){
            jasmine.clock().mockDate(fake_date);
        });

        it('should return current start date now if no date is passed', function() {
            var trip_range = new TripRange();
            expect(trip_range.start.toLocaleString()).toBe(fake_date.toLocaleString());
        });

        it('should return a start date from input', function(){
            var start_date_input = document.getElementById('start-date-field');
            var end_date_input = document.getElementById('end-date-field');

            console.log(start_date_input);

            var trip_range = new TripRange(start_date_input, end_date_input);

            expect(trip_range.start.toLocaleString()).toBe(start_date_input.value);
            expect(trip_range.end.toLocaleString()).toBe(end_date_input.value);

        });
    });
});
