# Changelog

All notable changes to this project will be documented in this file.

## [Unreleased] - 2026-01-29
### Added
- Modernized UI/UX to Bootstrap 5 (minimal, responsive)
- New footer and updated layouts
- `AuthFilter` added to protect authenticated routes
- Migrated legacy views to `app/Views` structure

### Fixed
- Protected routes now redirect to `/login` when not authenticated
