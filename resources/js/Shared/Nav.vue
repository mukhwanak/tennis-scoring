<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'">
          Home
        </NavLink>
      </li>

      <li>
        <NavLink href="/results/create" :active="$page.component === 'scores'">
         Scores
        </NavLink>
      </li>

    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";
export default {
  components: { NavLink },
};
</script>
