#include <stdio.h>
#include <math.h>

void sphere_dimensions(double diameter) {
    double radius = diameter / 2;
    double surface_area = 4 * M_PI * radius * radius;
    double volume = (4.0 / 3.0) * M_PI * radius * radius * radius;

    printf("Diameter of the sphere: %.4f\n", diameter);
    printf("Surface Area is %.4f\n", surface_area);
    printf("Volume is %.4f\n", volume);
}

int main() {
    double diameters[] = {13, 4.135, 72.2};
    for (int i = 0; i < 3; i++) {
        sphere_dimensions(diameters[i]);
    }
    return 0;
}