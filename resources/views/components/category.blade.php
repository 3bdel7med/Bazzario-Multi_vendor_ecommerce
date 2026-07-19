 <nav class="category-nav">
        <div class="container-fluid d-flex align-items-center">

            <!-- Left Arrow Indicator -->
            <div class="arrow-icon">&lt;</div>

            <!-- Navigation Items Container -->
            <div class="scroll-container flex-grow-1">
                <ul class="nav w-100 justify-content-start flex-nowrap">
                    @foreach ($categories as $category)
                        <li class="nav-item"><a class="nav-link" href="#">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
            </div>

        </div>
    </nav>
  <style>
        /* Custom styling to match the image precisely */
        .category-nav {
            background-color: #ffffff;
            border-top: 3px solid #ffcc00; /* Yellow top border line */
            border-bottom: 1px solid #e0e0e0;
            padding: 8px 0;
        }
        .category-nav .nav-link {
            color: #333333;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            padding: 4px 10px !important;
            transition: color 0.2s ease-in-out;
        }
        .category-nav .nav-link:hover {
            color: #007bff;
        }
        .scroll-container {
            display: flex;
            align-items: center;
            overflow-x: auto;
            scrollbar-width: none; /* Hide scrollbar for Firefox */
        }
        .scroll-container::-webkit-scrollbar {
            display: none; /* Hide scrollbar for Chrome/Safari */
        }
        .arrow-icon {
            color: #666;
            font-weight: bold;
            padding: 0 10px;
            cursor: pointer;
        }
    </style>
