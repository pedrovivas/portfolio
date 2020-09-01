<?php
  $message_sent = false;
  if(isset($_POST['email']) && $_POST['email'] != '') {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      $to = "contact@pedrovivas.com";
      $body = $message;

      mail($to, $subject, $body);

      $message_sent = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Portfolio - Pedro Vivas</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
    
    <script src="https://kit.fontawesome.com/f833a4d092.js" crossorigin="anonymous"></script>
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>
    
  </head>

  <body>
    <nav class="navbar sticky-top bg-white justify-content-around">
      <a class="nav-item nav-link" href="http://pedrovivas.com/">About</a>
      <a class="nav-item nav-link" href="#projects">Projects</a>
      <a class="nav-item nav-link" href="#contact">Contact</a>
    </nav>

    <div id="about" class="text-center">
      <div>
        <h1 class="pb-4 px-1 text-blue">Front-End Developer</h1>
        <img class="rounded-circle" src="./media/images/pedro-round-filter.jpg" alt="Profile picture" />
      </div>
      <div class="py-5 px-1 bg-blue text-white mt-n5">
        <h3 class="mt-3 mb-2 text-white">
          Hi, I'm Pedro. How are you doing?
        </h3>
        <p>
          I'm looking for new opportunities to work on amazing projects and keep
          learning new technologies.
        </p>
      </div>
    </div>

    <div id="projects" class="text-center pt-4">
      <h2 class="py-4 text-blue">Recent Work</h2>
      <div class="mb-5">
        <a
          class="card text-center mx-auto"
          href="https://karinejoncas.ca/"
          target="_blank"
        >
          <img src="media/images/KJ.png" class="card-img-top" alt="Karine Joncas website" />
          <div class="card-body border-top">
            <h4 class="card-text text-orange">
              Karine Joncas
            </h4>
          </div>
        </a>
          
        <div class="info-dropdown text-left mx-auto mt-1">
          <div class="info-link d-inline">
            <span class="text-blue">More info...</span>
            <div class="info-text bg-blue text-white mt-1 p-3 rounded">
              <p>
                Development and maintenance of the website. My daily tasks included adding and updating products, creating and editing pages according to the current promotions, and any other modifications that were required. 
              </p>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <div class="text-center pb-3">
      <h2 class="py-4 text-blue">Learning React</h2>
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 mb-5">
            <a
              class="card text-center mx-auto"
              href="https://pedrovivas.github.io/simple-todo-app/"
              target="_blank"
            >
              <img
                src="media/images/todo-app.png"
                class="card-img-top"
                alt="React project: Simple Todo App"
              />
              <div class="card-body border-top">
                <h4 class="card-text text-orange">
                  Simple Todo App
                </h4>
              </div>
            </a>

            <div class="info-dropdown text-left mx-auto mt-1">
              <div class="info-link d-inline">
                <span class="text-blue">More info...</span>
                <div class="info-text bg-blue text-white mt-1 p-3 rounded">
                  <p>
                    A simple to do list app to get an introduction of the basic features of React.
                  </p>
                </div>
              </div>
            </div>

          </div>
          <div class="col-12 col-md-6 mb-5">
            <a
              class="card text-center mx-auto"
              href="https://pedrovivas.github.io/phone-store/"
              target="_blank"
            >
              <img
                src="media/images/phone-store.png"
                class="card-img-top"
                alt="React project: Phone Store"
              />
              <div class="card-body border-top">
                <h4 class="card-text text-orange">
                  Phone Store
                </h4>
              </div>
            </a>

            <div class="info-dropdown text-left mx-auto mt-1">
              <div class="info-link d-inline">
                <span class="text-blue">More info...</span>
                <div class="info-text bg-blue text-white mt-1 p-3 rounded">
                  <p>
                    An online store to learn new React concepts like Context, Router and Styled Components.
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <?php
      if($message_sent):
    ?>
      <h3 id="contact" class="text-blue text-center mb-5">Thank you for reaching out!</h3>
    <?php
      else:
    ?>
    <div id="contact" class="pt-4 pb-5">
      <h2 class="py-4 text-blue text-center">Get in touch</h2>
      <form action="http://pedrovivas.com/#contact" method="POST" class="mx-auto mb-5 py-5 px-4 px-sm-5 bg-orange">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="Name"
            required
          />
        </div>
        <div class="form-group">
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            aria-describedby="emailHelp"
            placeholder="Email"
            required
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="subject"
            name="subject"
            placeholder="Subject"
            required
          />
        </div>
        <div class="form-group">
          <textarea
            class="form-control"
            rows="5"
            cols="50"
            id="message"
            name="message"
            placeholder="Enter Message..."
            tabindex="4"
            required
          ></textarea>
        </div>
        <div class="text-center pt-3">
          <button type="submit" class="btn btn-primary submit border-0 bg-blue">Send</button>
        </div>
      </form>
    </div>
    <?php
      endif;
    ?>

    <footer class="text-center py-5 bg-blue">
      <div id="icons-container" class="d-flex justify-content-between mx-auto">
        <a
          class="icons text-white text-decoration-none"
          href="https://github.com/pedrovivas/"
          target="_blank"
          ><i class="fab fa-github"></i
        ></a>
        <a
          class="icons text-white text-decoration-none"
          target="_blank"
          href="https://www.linkedin.com/in/pedro-vivas-3584518a/"
          ><i class="fab fa-linkedin-in"></i
        ></a>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <script src="script/script.js"></script>
  </body>
</html>
