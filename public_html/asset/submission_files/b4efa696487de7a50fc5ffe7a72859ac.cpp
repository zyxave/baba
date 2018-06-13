#include <iostream>
#include <iomanip>
#include <cmath>
using namespace std;

int main(){
	int n,x;
	int num[1003];
	cin >> n;
	for(int i = 1; i <=n ; i++){
		cin >> x;
		num[i] = floor(sqrt(x));
	}
	for(int j = 1; j <=n; j++){
		cout << num[j] << endl;
	}
	return 0;
}