@extends('home.master')

@section('Tctitle', 'Thêm mới bài viết')

@section('main-content')
<section id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2 class="medium-title">
            Contact Us
          </h2>
          <div class="information">
            <div class="contact-datails">
              <div class="icon">
                <i class="ti-location-pin"></i>
              </div>
              <div class="info">
                <h3>Address</h3>
                <span class="detail">Main Office: NO.22-23 Street Name- City,Country</span>
                <span class="datail">Customer Center: NO.130-45 Streen Name- City, Country</span>
              </div>
            </div>
            <div class="contact-datails">
              <div class="icon">
                <i class="ti-mobile"></i>
              </div>
              <div class="info">
                <h3>Phone Numbers</h3>
                <span class="detail">Main Office: +880 123 456 789</span>
                <span class="datail">Customer Supprort: +880 123 456 789 </span>
              </div>
            </div>
            <div class="contact-datails">
              <div class="icon">
                <i class="ti-location-arrow"></i>
              </div>
              <div class="info">
                <h3>Email Address</h3>
                <span class="detail">Customer
                Support: info@mail.com</span>
                <span class="detail">Technical Support: support@mail.com</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <!-- Form -->
          <form id="contactForm" class="contact-form" data-toggle="validator">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" placeholder="mail@sitename.com" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Massage" rows="11" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" id="submit" class="btn btn-common">Send Us</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<section class="find-job section">
    <div class="container">
        <h2 class="section-title">Đăng tin tuyển dụng</h2>
        <div class="row" id="job-list-container">
            <form method="post" action="{{ route('posts.store') }}" class="needs-validation" novalidate>
                @csrf
                <div style="display: none;">
                    <!-- Nội dung div không hiển thị -->
                    <input type="text" name="hiddenInput" value="Giá trị ẩn"> <h1></h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" required>
                            <div class="invalid-feedback">Please enter a title.</div>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label">Nội dung:</label>
                            <textarea name="summary" class="form-control" required></textarea>
                            <div class="invalid-feedback">Please enter a summary.</div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Mô tả:</label>
                            <textarea name="content" class="form-control" required></textarea>
                            <div class="invalid-feedback">Please enter content.</div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input type="text" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="job_typeid" class="form-label">Tác giả</label>
                            <input type="number" name="job_typeid" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid number for Tác giả.</div>
                        </div>

                        <div class="mb-3">
                            <label for="detail_link" class="form-label">Link:</label>
                            <input type="text" name="detail_link" class="form-control" required>
                            <div class="invalid-feedback">Please enter a link.</div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ:</label>
                            <input type="text" name="address" class="form-control" required>
                            <div class="invalid-feedback">Please enter an address.</div>
                        </div>
{{--
                        <div class="mb-3">
                            <label for="display_order" class="form-label">Display Order:</label>
                            <input type="number" name="display_order" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid number for Display Order.</div>
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label for="post_typeid" class="form-label">Post Typeid:</label>
                            <input type="number" name="post_typeid" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid number for Post Typeid.</div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="authorid" class="form-label">Author ID:</label>
                            <input type="number" name="authorid" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid number for Author ID.</div>
                        </div>

                        <div class="mb-3">
                            <label for="posting_date" class="form-label">Posting Date:</label>
                            <input type="date" name="posting_date" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid date for Posting Date.</div>
                        </div>

                        <div class="mb-3">
                            <label for="closing_date" class="form-label">Closing Date:</label>
                            <input type="date" name="closing_date" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid date for Closing Date.</div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <input type="text" name="status" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="vacancy_count" class="form-label">Vacancy Count:</label>
                            <input type="number" name="vacancy_count" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid number for Vacancy Count.</div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection
