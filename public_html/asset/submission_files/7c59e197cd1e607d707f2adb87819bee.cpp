#include<bits/stdc++.h>
using namespace std;
int main()
{
	int t; cin >> t;
	while(t--)
	{
		string s;
		long long k;
		cin >> s >> k;
		long long sum = 0;
		for(int i = 0; i < s.length(); i++)
		{
			sum += int(s[i]-'0')*k;
		}
		while(sum >= 10)
		{
			long long temp = 0;
			while(sum)
			{
				temp += sum%10;
				sum /= 10;
			}
			sum = temp;
		}
		cout << sum << "\n";
	}
}
