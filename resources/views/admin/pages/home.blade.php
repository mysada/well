@extends('admin.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col gap-4">
        <!-- Statics Section -->
        <h2 class="text-4xl font-bold" style="margin-top: 40px; margin-bottom: 20px">Statics</h2>
        <div class="stats shadow w-full">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Total Likes</div>
                <div class="stat-value text-primary">25.6K</div>
                <div class="stat-desc">21% more than last month</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="stat-title">Page Views</div>
                <div class="stat-value text-secondary">2.6M</div>
                <div class="stat-desc">21% more than last month</div>
            </div>

            <div class="stat">
                <div class="stat-value">86%</div>
                <div class="stat-title">Tasks done</div>
                <div class="stat-desc text-secondary">31 tasks remaining</div>
            </div>
        </div>

        <!-- Top Seller Section -->
        <div class="overflow-x-auto w-full mt-8">
            <h2 class="text-4xl font-bold" style="margin-bottom: 20px">Top Seller</h2>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Popularity</th>
                        <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Home Decor Range</td>
                        <td>80%</td>
                        <td>453</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Disney Princess Pink Bag 18'</td>
                        <td>65%</td>
                        <td>290</td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Bathroom Essentials</td>
                        <td>50%</td>
                        <td>186</td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Apple Smartwatches</td>
                        <td>30%</td>
                        <td>110</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Recent Logs Section -->
        <div class="overflow-x-auto w-full mt-8">
            <h2 class="text-4xl font-bold" style="margin-bottom: 20px">Recent Logs</h2>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Level</th>
                        <th>Message</th>
                        <th>Context</th>
                    </tr>
                </thead>
                <tbody>
                 <!-- Example row 1 -->
                    <tr>
                        <td>2024-08-09 14:00:01</td>
                        <td>INFO</td>
                        <td>User logged in successfully</td>
                        <td>{"user_id":1}</td>
                    </tr>
                    <!-- Example row 2 -->
                    <tr>
                        <td>2024-08-09 14:05:23</td>
                        <td>ERROR</td>
                        <td>Failed to process payment</td>
                        <td>{"error_code":123, "order_id":456}</td>
                    </tr>
                    <!-- Example row 3 -->
                    <tr>
                        <td>2024-08-09 14:10:34</td>
                        <td>WARNING</td>
                        <td>Disk space running low</td>
                        <td>{"disk":"/", "free_space":"500MB"}</td>
                    </tr>
                    <!-- Example row 4 -->
                    <tr>
                        <td>2024-08-09 14:15:45</td>
                        <td>DEBUG</td>
                        <td>Debugging request</td>
                        <td>{"request_id":"abc123"}</td>
                    </tr>
                    <!-- Example row 5 -->
                    <tr>
                        <td>2024-08-09 14:20:56</td>
                        <td>INFO</td>
                        <td>User updated profile</td>
                        <td>{"user_id":2}</td>
                    </tr>
                    <!-- Example row 6 -->
                    <tr>
                        <td>2024-08-09 14:25:07</td>
                        <td>ERROR</td>
                        <td>Invalid login attempt</td>
                        <td>{"user_id":3}</td>
                    </tr>
                    <!-- Example row 7 -->
                    <tr>
                        <td>2024-08-09 14:30:18</td>
                        <td>WARNING</td>
                        <td>API rate limit exceeded</td>
                        <td>{"api_key":"xyz789"}</td>
                    </tr>
                    <!-- Example row 8 -->
                    <tr>
                        <td>2024-08-09 14:35:29</td>
                        <td>DEBUG</td>
                        <td>Cache cleared</td>
                        <td>{"cache_key":"user:1"}</td>
                    </tr>
                    <!-- Example row 9 -->
                    <tr>
                        <td>2024-08-09 14:40:40</td>
                        <td>INFO</td>
                        <td>Password reset email sent</td>
                        <td>{"user_id":4}</td>
                    </tr>
                    <!-- Example row 10 -->
                    <tr>
                        <td>2024-08-09 14:45:51</td>
                        <td>ERROR</td>
                        <td>Database connection failed</td>
                        <td>{"error_code":500}</td>
                    </tr>
                    <!-- Example row 11 -->
                    <tr>
                        <td>2024-08-09 14:50:02</td>
                        <td>WARNING</td>
                        <td>High memory usage</td>
                        <td>{"memory_usage":"80%"}</td>
                    </tr>
                    <!-- Example row 12 -->
                    <tr>
                        <td>2024-08-09 14:55:13</td>
                        <td>DEBUG</td>
                        <td>Session started</td>
                        <td>{"session_id":"def456"}</td>
                    </tr>
                    <!-- Example row 13 -->
                    <tr>
                        <td>2024-08-09 15:00:24</td>
                        <td>INFO</td>
                        <td>Order placed successfully</td>
                        <td>{"order_id":789}</td>
                    </tr>
                    <!-- Example row 14 -->
                    <tr>
                        <td>2024-08-09 15:05:35</td>
                        <td>ERROR</td>
                        <td>Payment gateway timeout</td>
                        <td>{"gateway":"stripe"}</td>
                    </tr>
                    <!-- Example row 15 -->
                    <tr>
                        <td>2024-08-09 15:10:46</td>
                        <td>WARNING</td>
                        <td>Unusual login location</td>
                        <td>{"location":"New York"}</td>
                    </tr>
                    <!-- Example row 16 -->
                    <tr>
                        <td>2024-08-09 15:15:57</td>
                        <td>DEBUG</td>
                        <td>User data cache refreshed</td>
                        <td>{"user_id":5}</td>
                    </tr>
                    <!-- Example row 17 -->
                    <tr>
                        <td>2024-08-09 15:21:08</td>
                        <td>INFO</td>
                        <td>Email verification sent</td>
                        <td>{"user_id":6}</td>
                    </tr>
                    <!-- Example row 18 -->
                    <tr>
                        <td>2024-08-09 15:26:19</td>
                        <td>ERROR</td>
                        <td>File upload failed</td>
                        <td>{"file_name":"report.pdf"}</td>
                    </tr>
                    <!-- Example row 19 -->
                    <tr>
                        <td>2024-08-09 15:31:30</td>
                        <td>WARNING</td>
                        <td>API deprecated endpoint</td>
                        <td>{"endpoint":"/api/v1/old"}</td>
                    </tr>
                    <!-- Example row 20 -->
                    <tr>
                        <td>2024-08-09 15:36:41</td>
                        <td>DEBUG</td>
                        <td>Background job completed</td>
                        <td>{"job_id":"xyz123"}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
