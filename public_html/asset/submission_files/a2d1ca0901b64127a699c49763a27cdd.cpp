#include<stdio.h>
#include<iostream>
#include<string>
#include<algorithm>
#include<math.h>
#include<string.h>

using namespace std;

int db[10][10];
int n, m;

void floodfill(int x, int y) {
	if (db[y][x] == 1) db[y][x] = 2;
	if (y-1 >= 0 && db[y-1][x] == 1) {
		floodfill(x, y-1);
	}
	if (y-1 >= 0 && x-1 >= 0 && db[y-1][x-1] == 1) {
		floodfill(x-1, y-1);
	}
	if (x-1 >= 0 && db[y][x-1] == 1) {
		floodfill(x-1, y);
	}
	if (y+1 < m && x-1 >= 0 && db[y+1][x-1] == 1) {
		floodfill(x-1, y+1);
	}
	if (y+1 < m && db[y+1][x] == 1) {
		floodfill(x, y+1);
	}
	if (y+1 < m && x+1 < n && db[y+1][x+1] == 1) {
		floodfill(x+1, y+1);
	}
	if (x+1 < n && db[y][x+1] == 1) {
		floodfill(x+1, y);
	}
	if (y-1 >= 0 && x+1 < n && db[y-1][x+1] == 1) {
		floodfill(x+1, y-1);
	}
}

int main() {
	int tc;
	scanf("%d", &tc);
	while (tc--) {
		scanf("%d%d", &m, &n);
		memset(db, 0, sizeof(db));
		for (int iy = 0; iy < m; iy++) {
			for (int ix =  0; ix < n; ix++) {
				scanf("%d", &db[iy][ix]);
			}
		}
		int k = 0, o = 0;
		do {
			int x, y;
			o = 0;
			bool flag = false;
			for (int iy = 0; iy < m; iy++) {
				for (int ix =  0; ix < n; ix++) {
					if (db[iy][ix] == 1) {
						y = iy;
						x = ix;
						flag = true;
						break;
					}
				}
				if (flag) break;
			}
			floodfill(x, y);
			for (int iy = 0; iy < m; iy++) {
				for (int ix =  0; ix < n; ix++) {
					if (db[iy][ix] == 2) {
						o++;
						db[iy][ix] = 0;
					}
				}
			}
			k = max(o, k);
		} while (o > 0);
		printf("%d\n", k);
	}
}