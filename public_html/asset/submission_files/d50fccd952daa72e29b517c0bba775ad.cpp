#include <iostream>
#include <stdio.h>
#include <algorithm>
#include <math.h>
#include <string>
#include <string.h>

using namespace std;

int main() {
	int t;
	scanf("%d", &t);
	while (t--) {
		int n;
		scanf("%d", &n);
		int x = 0;
		for (int i = 0; i < n; i++) {
			int z;
			scanf("%d", &z);
			while (z >= 10) {
				x += z % 10;
				z /= 10;
			}
			x += z;
		}
		if (x % 3 == 0) printf("YES\n");
		else printf("NO\n");
	}
}
