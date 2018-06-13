#include<bits/stdc++.h>
using namespace std;

int biner(string s)
{
	int res = 0;
	for(int i = s.length()-1; i >= 0; i--)
	{
		if(s[i] == 'P')
		{
			res += int(pow(2,s.length()-i-1));
		}
	}
	return res;
}

int main()
{
	int t;
	cin >> t;
	while(t--)
	{
		int n; cin >> n;
		string ans = "";
		for(int i = 0; i < n; i++)
		{
			string temp = "";
			for(int j = 1; j <= 8; j++)
			{
				char c; cin >> c;
				temp += c;
			}
		//	cout << temp << "\n";
		//	cout << biner(temp) << "\n";
			ans += char(biner(temp));
		}
		cout << ans << "\n";
	}
}
