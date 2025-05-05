<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<style>
    .accordion-button {
      background-color: #6673fc;
      color: #ffffff;
    }

    .accordion-button:not(.collapsed) {
      background-color: #ffffff;
      color: #000000;
    }

    .accordion-collapse {
      background-color: #f5f5f5;
      color: #000000;
    }
  </style>
  <style>
    :root {
	--black: #000000;
	--white: #ffffff;
	--trans-black: rgba(0,0,0, 0.4);

	--system-base-9: rgba(28, 28, 30, 1);
	--system-base-8: rgba(44, 44, 46, 1);
	--system-base-7: rgba(58, 58, 60, 1);
	--system-base-6: rgba(72, 72, 74, 1);
	--system-base-5: rgba(99, 99, 102, 1);
	--system-base-4: rgba(142, 142, 147, 1);
	--system-base-3: rgba(174, 174, 178, 1);
	--system-base-2: rgba(199, 199, 204, 1);
	--system-base-1: rgba(209, 209, 214, 1);
	--system-base-50: rgba(229, 229, 234, 1);
	--system-base-0: rgba(242, 242, 247, 1);

	--gradient-1: linear-gradient(0deg, #F45D43 0%, #EB3349 100%);
	--gradient-2: linear-gradient(74.16deg, #EEB667 1.3%, #FE6C52 39.47%, #EC3449 100%);
	
	--red: rgba(255, 59, 48, 1);
	--red-transparent: rgba(255, 59, 48, 0.2);
	
	--blue: rgba(0, 122, 255, 1);
	--blue-transparent: rgba(0, 122, 255, 0.2);
	
	--green: rgba(52, 199, 89, 1);
	--green-transparent: rgba(52, 199, 89, 0.2);
	
	--mono: var(--system-base-6);
	--mono-transparent: var(--system-base-4);
	
	--root-bg: var(--system-base-50);
	--root-color: var(--system-base-9);
	--primary: var(--red);
	--primary-light: var(--red-transparent);
	--secondary: var(--system-base-4);
	--component-border: var(--system-base-2);
	--component-bg-hover: var(--system-base-2);
	--header-color: var(--primary);
}

.states: (
	primary: var(--primary),
	white: var(--white),
	black: var(--black),
	secondary: var(--secondary)
);

:root.theme--dark {
	--root-bg: var(--system-base-9);
	--root-color: var(--system-base-1);
	--component-border: var(--system-base-8);
	--component-bg-hover: var(--system-base-8);
	--secondary: var(--system-base-5);
}

$spacing-unit: 0.8rem;
$border-radius: 0.4rem;
$transition-time: 240ms;

$type-sizes: (
	h1: 								70px,
	h2: 								40px,
	h3: 								28px,
	h4: 								24px,
	h5: 								16px,
	h6: 								14px,
	p-lead:					20px,
	p-small: 			14px,
	p: 									17px,
	small: 					14px,
	small-caps: 12px
);

$type-sizes-mobile (
	h1: 								40px,
	h2: 								32px,
	h3: 								26px,
	h4: 								22px,
	h5: 								18px,
	h6: 								16px,
	p-lead:					18px,
	p-small: 			14px,
	p: 									16px,
	small: 					14px,
	small-caps: 12px
);

@function type-size($key) {
	@if(map-get($type-sizes, $key)) {
		@return map-get($type-sizes, $key)
	}
	@else {
		@warn 'The size you entered does not exist'
	}
}

@function type-size-mobile($key) {
	@if(map-get($type-sizes-mobile, $key)) {
		@return map-get($type-sizes-mobile, $key)
	}
	@else {
		@warn 'The size you entered does not exist'
	}
}

@mixin transition($variance) {
	transition: all $transition-time*$variance ease-out 0s;
}

html {
	box-sizing: border-box;
	font-size: 62.5%;
}

*, *:before, *:after {
	box-sizing: inherit;
}

html, body {
	width: 100%;
	height: 100%;
}

body {
	font-size: 1.6rem;
	background: var(--root-bg);
	color: var(--root-color);
	font-family: system-ui;
	line-height: 1.6;
}

a {
	text-decoration: none;
	padding: 0.4rem 0.8rem;
	color: inherit;
	background: var(--primary-light);
	border-radius: $border-radius;
	@include transition(.5);
	&:hover, &:focus {
		background: var(--primary);
		box-shadow: 0px 0px 0px $spacing-unit/2 var(--primary-light);
		color: var(--white);
	}
}

@mixin headerType($letter-spacing, $margin-bottom, $map-size) {
	letter-spacing: $letter-spacing;
	margin-bottom: $margin-bottom;
	margin-top: 0;
	font-size: type-size($map-size);
	@media screen and (max-width: 768px) {
		font-size: type-size-mobile($map-size);
	}
}

$headers: (h1,h2,h3,h4,h5,h6);

@each $header in $headers {
	#{$header} {
		@include headerType(0, 1.6rem, #{$header});
	}
}

//////////////////////////////////////////
// $TOAST-GRID
// https://github.com/daneden/Toast
//////////////////////////////////////////

// Namespaces
// This stops me from being overzealous with enforcing classes
$toast-grid-namespace: "grid" !default;
$toast-grid-column-namespace: "grid__col" !default;

// $col-groups are the column groups you want
// For example, $col-groups: (3, 4, 5) will output:
// .grid__col--n-of-3, .grid__col--n-of-4, [...]
$toast-col-groups: (2, 3, 4, 5, 6, 8, 12) !default;

// Gutter width
$toast-gutter-width: 1.6rem !default;

// Breakpoints
$toast-breakpoint-medium: 700px !default;
$toast-breakpoint-small: 480px !default;

// Pushes and pulls
$toast-pushes: true !default;
$toast-pulls: true !default;

.#{$toast-grid-namespace} {
  list-style: none;
  margin-left: -$toast-gutter-width;
}

%span-all       { width: percentage(1/1); }

%one-half       { width: percentage(1/2); }

%one-third      { width: percentage(1/3); }
%two-thirds     { width: percentage(2/3); }

%one-quarter    { width: percentage(1/4); }
%two-quarters   { width: percentage(2/4); }
%three-quarters { width: percentage(3/4); }

%push-span-all       { margin-left: percentage(1/1); }

%push-one-half       { margin-left: percentage(1/2); }

%push-one-third      { margin-left: percentage(1/3); }
%push-two-thirds     { margin-left: percentage(2/3); }

%push-one-quarter    { margin-left: percentage(1/4); }
%push-two-quarters   { margin-left: percentage(2/4); }
%push-three-quarters { margin-left: percentage(3/4); }

%pull-span-all       { margin-left: -(percentage(1/1)); }

%pull-one-half       { margin-left: -(percentage(1/2)); }

%pull-one-third      { margin-left: -(percentage(1/3)); }
%pull-two-thirds     { margin-left: -(percentage(2/3)); }

%pull-one-quarter    { margin-left: -(percentage(1/4)); }
%pull-two-quarters   { margin-left: -(percentage(2/4)); }
%pull-three-quarters { margin-left: -(percentage(3/4)); }

// For each of our column groups...
@each $group in $toast-col-groups {

  // For each column width from 1 to the column group...
  @for $i from 1 through $group {
    .#{$toast-grid-column-namespace}--#{$i}-of-#{$group} {
      @if percentage($i/$group) == percentage(1/1) {
        @extend %span-all;
      } @else if percentage($i/$group) == percentage(1/2) {
        @extend %one-half;
      } @else if percentage($i/$group) == percentage(1/3) {
        @extend %one-third;
      } @else if percentage($i/$group) == percentage(2/3) {
        @extend %two-thirds;
      } @else if percentage($i/$group) == percentage(1/4) {
        @extend %one-quarter;
      } @else if percentage($i/$group) == percentage(2/4) {
        @extend %two-quarters;
      } @else if percentage($i/$group) == percentage(3/4) {
        @extend %three-quarters;
      } @else {

        width: percentage($i/$group);

      }
    }

    @if ($toast-pushes) {
      .#{$toast-grid-column-namespace}--push-#{$i}-of-#{$group} {
        @if percentage($i/$group) == percentage(1/1) {
          @extend %push-span-all;
        } @else if percentage($i/$group) == percentage(1/2) {
          @extend %push-one-half;
        } @else if percentage($i/$group) == percentage(1/3) {
          @extend %push-one-third;
        } @else if percentage($i/$group) == percentage(2/3) {
          @extend %push-two-thirds;
        } @else if percentage($i/$group) == percentage(1/4) {
          @extend %push-one-quarter;
        } @else if percentage($i/$group) == percentage(2/4) {
          @extend %push-two-quarters;
        } @else if percentage($i/$group) == percentage(3/4) {
          @extend %push-three-quarters;
        } @else {

          margin-left: percentage($i/$group);

        }
      }
    } // end pushes

    @if ($toast-pulls) {
      .#{$toast-grid-column-namespace}--pull-#{$i}-of-#{$group} {

        @if percentage($i/$group) == percentage(1/1) {
          @extend %pull-span-all;
        } @else if percentage($i/$group) == percentage(1/2) {
          @extend %pull-one-half;
        } @else if percentage($i/$group) == percentage(1/3) {
          @extend %pull-one-third;
        } @else if percentage($i/$group) == percentage(2/3) {
          @extend %pull-two-thirds;
        } @else if percentage($i/$group) == percentage(1/4) {
          @extend %pull-one-quarter;
        } @else if percentage($i/$group) == percentage(2/4) {
          @extend %pull-two-quarters;
        } @else if percentage($i/$group) == percentage(3/4) {
          @extend %pull-three-quarters;
        } @else {

          margin-left: -(percentage($i/$group));

        }
      }
    } // end pulls
  } // end @for

} // end @each

// All direct descendents of .grid get treated the same way.
// This might be overkill for some, but it's a time-saver for me.
.#{$toast-grid-column-namespace} {
  box-sizing: border-box;
  display: inline-block;
  margin-right: -.25em;
  min-height: 1px;
  padding-left: $toast-gutter-width;
  vertical-align: top;

  @media (max-width: $toast-breakpoint-medium) {
    display: block;
    margin-left: 0;
    margin-right: 0;
    width: auto;
  }

  @media (max-width: $toast-breakpoint-medium) and (min-width: $toast-breakpoint-small) {
    &[class*="#{$toast-grid-column-namespace}--m-"] {
      display: inline-block;
      margin-right: -.24em;
    }

    &.#{$toast-grid-column-namespace}--m-1-of-2 {
      width: percentage(1/2);
    }

    &.#{$toast-grid-column-namespace}--m-1-of-3 {
      width: percentage(1/3);
    }

    &.#{$toast-grid-column-namespace}--m-2-of-3 {
      width: percentage(2/3);
    }

    &.#{$toast-grid-column-namespace}--m-1-of-4 {
      width: percentage(1/4);
    }

    &.#{$toast-grid-column-namespace}--m-2-of-4 {
      @extend .#{$toast-grid-column-namespace}--m-1-of-2;
    }

    &.#{$toast-grid-column-namespace}--m-3-of-4 {
      width: percentage(3/4);
    }
  }

  @media (max-width: $toast-breakpoint-small) {
    &[class*="#{$toast-grid-column-namespace}--s-"] {
      display: inline-block;
      margin-right: -.24em;
    }

    &.#{$toast-grid-column-namespace}--s-1-of-2 {
      width: percentage(1/2);
    }

    &.#{$toast-grid-column-namespace}--s-1-of-3 {
      width: percentage(1/3);
    }

    &.#{$toast-grid-column-namespace}--s-2-of-3 {
      width: percentage(2/3);
    }

    &.#{$toast-grid-column-namespace}--s-1-of-4 {
      width: percentage(1/4);
    }

    &.#{$toast-grid-column-namespace}--s-2-of-4 {
      @extend .#{$toast-grid-column-namespace}--s-1-of-2;
    }

    &.#{$toast-grid-column-namespace}--s-3-of-4 {
      width: percentage(3/4);
    }
  }
}

// Centers the column in the grid and clears the row of all other columns
.#{$toast-grid-column-namespace}--centered {
  display: block;
  margin-left: auto;
  margin-right: auto;
}


// Displays the column as the first in its row
.#{$toast-grid-column-namespace}--d-first {
  float: left;
}

// Displays the column as the last in its row
.#{$toast-grid-column-namespace}--d-last {
  float: right;
}

// Removes gutters from the columns
.#{$toast-grid-namespace}--no-gutter {
  margin-left: 0;
  width: 100%;

  .#{$toast-grid-column-namespace} {
    padding-left: 0;
  }

  .#{$toast-grid-column-namespace}--span-all {
    margin-left: 0;
    width: 100%;
  }
}

// Align column to the bottom.
.#{$toast-grid-column-namespace}--ab {
  vertical-align: bottom;
}

// Align column to the middle.
.#{$toast-grid-column-namespace}--am {
  vertical-align: middle;
}

.l-wrapper {
	max-width: 768px;
	margin: 0 auto;
	padding: 0 ;
}

.l-header {
	background: var(--header-color);
	padding-top: 4rem;
	&__title {
		color: var(--white);
		margin-bottom: 3.2rem;
	}
	&__content {
		position: relative;
		top: 8.8rem;
	}
	&__text {
		display: flex;
		align-items: center;
		margin-bottom: 1.6rem;
	}
}

.c-media {
	display: flex;
	align-items: center;
	&__img {
		$size: 5.6rem;
		width: $size;
		height: $size;
		background: var(--black);
		border: .4rem solid var(--white);
		margin-right: 1.6rem;
		border-radius: 50%;
		box-shadow: 0px 5px 12px rgba(black, .1);
	}
}

.c-toggle {
	display: inline-flex;
	&__item {
		background: transparent;
		cursor: pointer;
		color: var(--trans-black);
		border: 0;
		border-bottom: 1px solid transparent;
		display: inline-flex;
		align-items: center;
		padding: 0.4rem 0;
		margin-right: 1.6rem;
		@include transition(1);
		&:active, &:focus {
			outline: 0;
		}
		&--active {
			border-color: currentColor;
			color: var(--white);
		}
	}
	&__icon {
		width: 1em;
		margin-right: 0.8rem;
	}
}

main {
	position: relative;
	top: 10.4rem;
}

.c-social {
	display: flex;
	align-items: center;
	&__link {
		&:not(:last-of-type) {
			margin-right: 0.8rem;
		}
	}
}

.c-list {
	margin: 0 0 2.4rem;
	padding: 0;
	list-style-type: none;
	&__item {
		display: block;
		width: 100%;
		padding-bottom: 0.8rem;
		background: transparent;
		border-radius: 0;
		border-bottom: 1px solid var(--component-border);
		&:not(:first-of-type) {
			padding-top: 0.8rem;
		}
	}
	&__icon {
		width: 1em;
		margin-right: .8rem;
	}
	&__link {
		background: transparent;
		display: flex;
		align-items: center;
		&:hover {
			background: var(--component-bg-hover);
			box-shadow: none;
			color: inherit;
		}
	}
}

.asdf {
	position: fixed;
	top: 1rem;
	left: 1rem;
}

@each $key,$val in $states {
	.u-text--#{$key} {
		color: $val !important;
	}
}

.c-theme {
	position: absolute;
	top: $spacing-unit*2;
	right: $spacing-unit*2;
	display: grid;
	grid-template-columns: repeat(4, $spacing-unit*4);
	grid-column-gap: $spacing-unit*2;
	&__button {
		$size: $spacing-unit*4;
		border: $spacing-unit/4 solid rgba(white, 1);
		cursor: pointer;
		width: $size;
		height: $size;
		border-radius: 50%;
		background: currentColor;
		padding: 0;
		&:focus, &:active {
			outline: 0;
		}
	}
}
  </style>
  
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Ask Question Here?</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Blank Page</li>
							</ol>
						</div>
					</div>
					<!-- start resume -->
<div class="container my-5">
  <!-- <h1 class="text-center mb-5">FAQ</h1> -->
  header.l-header
	.c-theme
		button.c-theme__button(style="color: var(--red)" onclick="changeTheme('red')")
		button.c-theme__button(style="color: var(--blue)" onclick="changeTheme('blue')")
		button.c-theme__button(style="color: var(--green)" onclick="changeTheme('green')")
		button.c-theme__button(style="color: var(--mono)" onclick="changeTheme('mono')")
	.l-header__content.l-wrapper
		.grid__col.grid__col--3-of-3
			.c-toggle
				button.c-toggle__item.c-toggle__item--active(data-theme="light")
					i.c-toggle__icon(data-feather="sun")
					| Light
				button.c-toggle__item(data-theme="dark")
					i.c-toggle__icon(data-feather="moon")
					| Dark
			.c-media
				.c-media__content
					h2.l-header__title Kevin Magnussen
					.l-header__text
						strong Product Designer&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Mountain View, CA
					.c-social
						a.c-social__link(href="#") Instagram
						a.c-social__link(href="#") LinkedIn
						a.c-social__link(href="#") Twitter
						a.c-social__link(href="#") Dribbble
main.l-wrapper
	.grid__col.grid__col--1-of-3
		h4.u-text--primary Contact
		ul.c-list
			li.c-list__item
				a.c-list__link(href="#")
					i.c-list__icon(data-feather="link") 
					| www.ryanparag.com
			li.c-list__item
				a.c-list__link(href="#")
					i.c-list__icon(data-feather="mail") 
					| parag.ryan@gmail.com
			li.c-list__item
				a.c-list__link(href="#")
					i.c-list__icon(data-feather="phone") 
					| (123) 456-7890
					
		h4.u-text--primary Skills
		h5.u-text--secondary Design
		ul.c-list
			li.c-list__item Adobe Creative Suite
			li.c-list__item Sketch
			li.c-list__item Figma
			li.c-list__item InVision
			
		h5.u-text--secondary Technical
		ul.c-list
			li.c-list__item HTML, CSS, Python, Javascript, SQL
			
		h5.u-text--secondary Process
		ul.c-list
			li.c-list__item User Research, Prototyping, Interaction Design, Usability Testing, Specs, Branding, Content Strategy, Metrics, Inclusive Design
			
		h4.u-text--primary Education
		ul.c-list
			li.c-list__item
				strong University of Central Florida
				br
				span BA Honors HCI
				br
				span Graduated 2014
				br
				small.u-text--secondary Orlando, FL, USA
					
	.grid__col.grid__col--2-of-3
		h4.u-text--primary Experience
		ul.c-list
			li.c-list__item
				strong Company 1
				| &nbsp;- Product Designer
				br
				span.u-text--secondary Mountain View | 2018 - Current
				p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus maximus libero, eget blandit ipsum. Aenean accumsan dui dolor, ut vulputate justo ornare sit amet. Mauris consectetur gravida eros, in pharetra dui. Aenean hendrerit eros quis lectus bibendum, non ultrices quam ultricies.
			li.c-list__item
				strong Company 2
				| &nbsp;- UX Designer & Researcher
				br
				span.u-text--secondary San Mateo | 2017 - 2018
				p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus maximus libero, eget blandit ipsum. Aenean accumsan dui dolor, ut vulputate justo ornare sit amet. Mauris consectetur gravida eros, in pharetra dui. Aenean hendrerit eros quis lectus bibendum, non ultrices quam ultricies.
			li.c-list__item
				strong Company 3
				| &nbsp;- UX Researcher
				br
				span.u-text--secondary San Francisco | 2016 - 2017
				p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus maximus libero, eget blandit ipsum. Aenean accumsan dui dolor, ut vulputate justo ornare sit amet. Mauris consectetur gravida eros, in pharetra dui. Aenean hendrerit eros quis lectus bibendum, non ultrices quam ultricies.
			li.c-list__item
				strong Company 4
				| &nbsp;- Product Design Intern
				br
				span.u-text--secondary Sunnyvale | 2015 - 2016
				p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus maximus libero, eget blandit ipsum. Aenean accumsan dui dolor, ut vulputate justo ornare sit amet. Mauris consectetur gravida eros, in pharetra dui. Aenean hendrerit eros quis lectus bibendum, non ultrices quam ultricies.

</div>
				</div>
			</div>
			<!-- end page content -->
		
		<?php require APPROOT . '/views/inc_student/footer.php'; ?>
		<script>
    function search() {
      var input = document.getElementById("search-input").value.toLowerCase();
      var items = document.getElementsByClassName("accordion-item");
      for (var i = 0; i < items.length; i++) {
        var question = items[i].querySelector(".accordion-button").textContent.toLowerCase();
        var answer = items[i].querySelector(".accordion-body").textContent.toLowerCase();
        if (question.indexOf(input) > -1 || answer.indexOf(input) > -1) {
          items[i].style.display = "";
        } else {
          items[i].style.display = "none";
        }
      }
    }
  </script>
<script>
  console.clear();

feather.replace()

const toggleButtons = document.querySelectorAll('.c-toggle__item');

toggleButtons.forEach(button => {
	button.addEventListener('click', () => {
		if(!button.classList.contains('c-toggle__item--active')) {
			button.parentNode.querySelector('.c-toggle__item--active')
				.classList.remove('c-toggle__item--active');
			button.classList.add('c-toggle__item--active');
			const theme = button.dataset.theme;
			if(theme == 'dark') {
				document.documentElement.classList.add('theme--dark');
			} else {
				document.documentElement.classList.remove('theme--dark');
			}
		}
	})
})

const changeTheme = type => {
	document.documentElement.style.setProperty('--primary', `var(--${type})`)
	document.documentElement.style.setProperty('--primary-light', `var(--${type}-transparent)`)
}
</script>
